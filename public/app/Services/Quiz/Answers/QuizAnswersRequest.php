<?php
namespace App\Services\Quiz\Answers;

class QuizAnswersRequest
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