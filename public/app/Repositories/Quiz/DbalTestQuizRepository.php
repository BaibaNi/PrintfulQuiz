<?php

namespace App\Repositories\Quiz;

use App\Database;

class DbalTestQuizRepository implements QuizRepository
{
    /** get the list of all available Quizzes */
    public function getQuizzesList(): array
    {
        return Database::connection()
            ->prepare('SELECT * FROM `test_quizzes` WHERE `is_available` = true')
            ->executeQuery()
            ->fetchAllAssociative();
    }

    /** get the user selected Quiz */
    public function getSelectedQuiz(int $quizId): array
    {
        $stmt = Database::connection()
            ->prepare('SELECT * FROM `test_quizzes` WHERE `id` = ?');
        $stmt->bindValue(1, $quizId);

        return $stmt
            ->executeQuery()
            ->fetchAssociative();
    }

    /** get all questions available to selected quiz */
    public function getQuestions(int $quizId): array
    {
        $stmt = Database::connection()
            ->prepare('SELECT * FROM `test_quiz_questions` WHERE `quiz_id` = ?');
        $stmt->bindValue(1, $quizId);

        return $stmt
            ->executeQuery()
            ->fetchAllAssociative();
    }

    /** get all answers available to selected quiz / questions */
    public function getAnswers(int $quizId): array
    {
        $stmt = Database::connection()
            ->prepare('SELECT * FROM `test_quiz_answers` WHERE `quiz_id` = ?');
        $stmt->bindValue(1, $quizId);

        return $stmt
            ->executeQuery()
            ->fetchAllAssociative();
    }
}