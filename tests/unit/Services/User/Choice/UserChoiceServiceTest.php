<?php

namespace Tests\unit\Services\User\Choice;

use App\Repositories\User\DbalTestUserRepository;
use App\Repositories\User\UserRepository;
use App\Services\User\Choice\UserChoiceRequest;
use App\Services\User\Choice\UserChoiceService;
use App\Services\User\Profile\UserProfileRequest;
use App\Services\User\Profile\UserProfileService;
use PHPUnit\Framework\TestCase;

class UserChoiceServiceTest extends TestCase
{
    public function testCanRegisterUserChoiceAndGetUserId(): void
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions([
            UserRepository::class => \DI\create(DbalTestUserRepository::class),
        ]);
        $container = $builder->build();

        $choiceService = $container->get(UserChoiceService::class);
        $choiceRequest = new UserChoiceRequest('Test Name', 1);

        $profileService = $container->get(UserProfileService::class);
        $profileRequest = new UserProfileRequest($choiceService->execute($choiceRequest));

        $this->assertSame('Test Name', $profileService->execute($profileRequest)['name']);
    }
}
