<?php

namespace App\Services\User\Choice;

class UserChoiceRequest
{
    private string $name;
    private int $quizId;

    public function __construct(string $name, int $quizId)
    {
        $this->name = $name;
        $this->quizId = $quizId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getQuizId(): int
    {
        return $this->quizId;
    }
}
