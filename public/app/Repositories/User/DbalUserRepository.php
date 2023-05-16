<?php

namespace App\Repositories\User;

use App\Database;

class DbalUserRepository implements UserRepository
{
    public function registerUserChoice(string $userName, int $quizId): int
    {
        /** register user (name) and it's selected quiz ID in the database and return the user's ID */
        Database::connection()
            ->insert('users', [
                'name' => $userName,
                'quiz_id' => $quizId
            ]);

        return Database::connection()->lastInsertId('users');
    }

    public function registerUserAnswer(int $userId, int $quizId, int $quizQuestionId, int $quizAnswerId): void
    {
        /** register user answer */
        Database::connection()
            ->insert('user_answers', [
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'quiz_question_id' => $quizQuestionId,
                'quiz_answer_id' => $quizAnswerId,
            ]);
    }

    public function getUserAnswers(int $userId, int $quizId): array
    {
        $stmt = Database::connection()
            ->prepare('SELECT * FROM `user_answers` WHERE `user_id` = ? AND `quiz_id` = ?');
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $quizId);

        return $stmt
            ->executeQuery()
            ->fetchAllAssociative();
    }


    public function getUser(int $userId): array
    {
        $stmt = Database::connection()
            ->prepare('SELECT * FROM `users` WHERE `id` = ?');
        $stmt->bindValue(1, $userId);

        return $stmt
            ->executeQuery()
            ->fetchAssociative();
    }

    public function storeUserResult(int $userId, int $correctAnswers, int $questionsCount): void
    {
        /** register user result */
        Database::connection()
            ->insert('user_results', [
                'user_id' => $userId,
                'correct_answers' => $correctAnswers,
                'questions_count' => $questionsCount,
            ]);
    }
}