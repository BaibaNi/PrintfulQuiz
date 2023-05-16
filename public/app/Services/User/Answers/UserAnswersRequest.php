<?php
namespace App\Services\User\Answers;

class UserAnswersRequest
{
    private int $userId;
    private int $quizId;

    public function __construct(int $userId, int $quizId)
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
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
}