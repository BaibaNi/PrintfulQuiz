<?php

namespace Tests\unit\Services\User\Answers;

use App\Repositories\User\DbalTestUserRepository;
use App\Repositories\User\UserRepository;
use App\Services\User\Answers\UserAnswersRequest;
use App\Services\User\Answers\UserAnswersService;
use PHPUnit\Framework\TestCase;

class UserAnswersServiceTest extends TestCase
{
    private array $expectedUserAnswers = [
        1 => 2,
        2 => 5,
        3 => 8,
    ];

    public function testCanGetSubmittedUserAnswers(): void
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions([
            UserRepository::class => \DI\create(DbalTestUserRepository::class),
        ]);
        $container = $builder->build();

        $service = $container->get(UserAnswersService::class);
        $request = new UserAnswersRequest(1, 1);

        $this->assertSame($this->expectedUserAnswers, $service->execute($request));
    }
}
