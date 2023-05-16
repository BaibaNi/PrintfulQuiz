<?php

namespace App\Services\Quiz\Selected;

class QuizSelectedRequest
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