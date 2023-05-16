<?php

namespace App\Services\User\Profile;

use App\Repositories\User\UserRepository;
use App\Services\User\Choice\UserChoiceRequest;

class UserProfileService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserProfileRequest $request): array
    {
        return $this->userRepository->getUser($request->getUserId());
    }
}