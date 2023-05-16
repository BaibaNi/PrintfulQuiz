<?php

namespace App\Services\User\Answer;

class UserAnswerRequest
{
    private int $userId;
    private int $quizId;
    private int $quizQuestionId;
    private int $quizAnswerId;

    public function __construct(int $userId, int $quizId, int $quizQuestionId, int $quizAnswerId)
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->quizQuestionId = $quizQuestionId;
        $this->quizAnswerId = $quizAnswerId;
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
    public function getQuizId(): int
    {
        return $this->quizId;
    }

    /**
     * @return int
     */
    public function getQuizQuestionId(): int
    {
        return $this->quizQuestionId;
    }

    /**
     * @return int
     */
    public function getQuizAnswerId(): int
    {
        return $this->quizAnswerId;
    }

}