<?php
// todo
namespace App\Models;

class UserAnswers
{
    private int $quizId;

    public function __construct(int $quizId)
    {
        $this->quizId = $quizId;
    }

    /**
     * @return int
     */
    public function getQuizId(): int
    {
        return $this->quizId;
    }
}