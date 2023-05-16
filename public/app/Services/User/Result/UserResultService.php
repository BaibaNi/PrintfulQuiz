<?php

namespace App\Services\User\Result;

use App\Repositories\User\UserRepository;

class UserResultService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserResultRequest $request): void
    {
        $this->userRepository->storeUserResult(
            $request->getUserId(),
            $request->getCorrectAnswers(),
            $request->getQuestionsCount()
        );
    }
}