<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();
use App\Redirect;
use App\Repositories\Quiz\DbalQuizRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Repositories\User\DbalUserRepository;
use App\Repositories\User\UserRepository;
use App\Validations\Errors;
use App\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controllers\QuizController;
use Twig\TwigFunction;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    QuizRepository::class => DI\create(DbalQuizRepository::class),
    UserRepository::class => DI\create(DbalUserRepository::class),
]);
$container = $builder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [QuizController::class, 'index']);
    $r->addRoute('POST', '/', [QuizController::class, 'start']);

    $r->addRoute('GET', '/quiz/{id:\d+}', [QuizController::class, 'quiz']);
    $r->addRoute('POST', '/quiz/{id:\d+}', [QuizController::class, 'answer']);

    $r->addRoute('GET', '/quiz/{id:\d+}/results', [QuizController::class, 'results']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        //var_dump('404 Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        //var_dump('405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        /** @var View $response */
        $response = (new $controller($container))->$method($vars);

        $loader = new FilesystemLoader('app/Views');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $twig->addFunction(
            new TwigFunction('errors', function(string $url) { return Errors::getAll(); })
        );
        $twig->addFunction(
            new TwigFunction('asset', function ($path) { return '/app/Assets/' . $path; })
        );


        if($response instanceof View)
        {
            echo $twig->render($response->getPath() . '.html', $response->getVariables());
        }

        if($response instanceof Redirect)
        {
            header('Location: ' . $response->getLocation());
            exit;
        }

        break;
}

if(isset($_SESSION['errors'])){
    unset($_SESSION['errors']);
}

if(isset($_SESSION['inputs'])){
    unset($_SESSION['inputs']);
}
