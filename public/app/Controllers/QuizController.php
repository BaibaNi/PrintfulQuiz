<?php

namespace App\Controllers;

use App\Database;
use App\Redirect;
use App\Services\Quiz\Answers\QuizAnswersRequest;
use App\Services\Quiz\Answers\QuizAnswersService;
use App\Services\Quiz\List\QuizListService;
use App\Services\Quiz\Selected\QuizSelectedRequest;
use App\Services\Quiz\Selected\QuizSelectedService;
use App\Services\User\Answer\UserAnswerRequest;
use App\Services\User\Answer\UserAnswerService;
use App\Services\User\Answers\UserAnswersRequest;
use App\Services\User\Answers\UserAnswersService;
use App\Services\User\Choice\UserChoiceRequest;
use App\Services\User\Choice\UserChoiceService;
use App\Services\User\Profile\UserProfileRequest;
use App\Services\User\Profile\UserProfileService;
use App\Services\User\Result\UserResultRequest;
use App\Services\User\Result\UserResultService;
use App\Validations\Errors;
use App\Validations\UserChoiceValidator;
use App\View;
use Psr\Container\ContainerInterface;

class QuizController extends Database
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(): View
    {
        /** get the list of all available Quizzes */
        $service = $this->container->get(QuizListService::class);
        $quizList = $service->execute();

        return new View('Quiz/index', [
            'quiz_list' => $quizList,
            'errors' => Errors::getAll(),
        ]);
    }

    public function start(): Redirect
    {
        /** validate the input values */
        $validator = new UserChoiceValidator($_POST, [
            'name' => ['Required:yes', 'Min:3'],
            'quiz' => ['Required:yes'],
        ]);

        try {
            /** if input fields are validated, continue to registering user and selected quiz */
            $validator->passes();

            $service = $this->container->get(UserChoiceService::class);
            $userId = $service->execute(new UserChoiceRequest($_POST['name'], $_POST['quiz']));

            /** Register user's ID in the session */
            session_start();
            $_SESSION['userid'] = $userId;

            /** redirect user to the selected quiz */
            return new Redirect('/quiz/' . $_POST['quiz']);

        } catch (\Exception $exception) {
            /** if input is not validated, return to the index page and display errors */
            $_SESSION['errors'] = $validator->getErrors();
            return new Redirect('/');
        }
    }

    public function quiz(array $vars): View
    {
        /** get the Quiz of user choice */
        $service = $this->container->get(QuizSelectedService::class);
        $quiz = $service->execute(new QuizSelectedRequest($vars['id']));

        /** Pass the questions and answers to JavaScript through the global variable */
        $jsonData = json_encode($quiz->getQuestionsWithAnswers());
        echo "<script>let quizData = {$jsonData};</script>";

        return new View('Quiz/quiz', [
            'quiz_id' => $quiz->getQuizId(),
            'quiz_name' => $quiz->getQuizName(),
            'questions_answers' => $quiz->getQuestionsWithAnswers(),
        ]);
    }

    public function answer(): void
    {
        $service = $this->container->get(UserAnswerService::class);
        $service->execute(new UserAnswerRequest(
            $_SESSION['userid'],
            $_POST['quiz_id'],
            $_POST['quiz_question_id'],
            $_POST['quiz_answer_id']
        ));
    }

    public function results(array $vars): View
    {
        /** get User profile */
        $service = $this->container->get(UserProfileService::class);
        $userProfile = $service->execute(new UserProfileRequest(
            $_SESSION['userid'],
        ));

        /** get User submitted answers */
        $service = $this->container->get(UserAnswersService::class);
        $userAnswers = $service->execute(new UserAnswersRequest(
            $_SESSION['userid'],
            $vars['id'],
        ));

        /** get correct answers */
        $service = $this->container->get(QuizAnswersService::class);
        $correctAnswers = $service->execute(new QuizAnswersRequest(
            $vars['id'],
        ));
        $questionCount = count($correctAnswers);

        /** count incorrect and user correct answers */
        $incorrectAnswers = count(array_diff_assoc($userAnswers, $correctAnswers));
        $userCorrectAnswers = $questionCount - $incorrectAnswers;

        /** save user results in the table and display in the view */
        $service = $this->container->get(UserResultService::class);
        $service->execute(new UserResultRequest(
            $_SESSION['userid'],
            $userCorrectAnswers,
            $questionCount
        ));

//        session_destroy();

        return new View('Quiz/results', [
            'user_name' => $userProfile['name'],
            'user_result' => $userCorrectAnswers,
            'question_count' => $questionCount
        ]);
    }
}