<?php

namespace App\Services\User\Result;

class UserResultRequest
{
    private int $userId;
    private int $correctAnswers;
    private int $questionsCount;

    public function __construct(int $userId, int $correctAnswers, int $questionsCount)
    {
        $this->userId = $userId;
        $this->correctAnswers = $correctAnswers;
        $this->questionsCount = $questionsCount;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getCorrectAnswers(): int
    {
        return $this->correctAnswers;
    }

    /**
     * @return int
     */
    public function getQuestionsCount(): int
    {
        return $this->questionsCount;
    }
}