<?php

namespace App\Services\User\Answer;

use App\Repositories\User\UserRepository;

class UserAnswerService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserAnswerRequest $request): void
    {
        $this->userRepository->registerUserAnswer(
            $request->getUserId(),
            $request->getQuizId(),
            $request->getQuizQuestionId(),
            $request->getQuizAnswerId()
        );
    }
}