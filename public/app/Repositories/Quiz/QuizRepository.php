<?php

namespace App\Repositories\Quiz;

use App\Models\Quiz;

interface QuizRepository
{
    public function getQuizzesList(): array;
    public function getSelectedQuiz(int $quizId): array;
    public function getQuestions(int $quizId): array;
    public function getAnswers(int $quizId): array;

}