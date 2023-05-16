<?php

namespace App\Services\User\Choice;

use App\Repositories\User\UserRepository;

class UserChoiceService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserChoiceRequest $request): int
    {
        return $this->userRepository->registerUserChoice($request->getName(), $request->getQuizId());
    }
}