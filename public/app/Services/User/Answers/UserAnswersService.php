<?php

namespace App\Services\User\Answers;

use App\Repositories\User\UserRepository;
use App\Services\User\Answer\UserAnswerRequest;
use App\Services\User\Answers\UserAnswersRequest;

class UserAnswersService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserAnswersRequest $request): array
    {
        $userAnswers = [];
        $rawUserAnswers = $this->userRepository->getUserAnswers($request->getUserId(), $request->getQuizId());

        foreach ($rawUserAnswers as $answer) {
            $userAnswers[$answer['quiz_question_id']] = $answer['quiz_answer_id'];
        }

        return $userAnswers;
    }
}