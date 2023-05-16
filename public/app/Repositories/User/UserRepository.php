<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function registerUserChoice(string $userName, int $quizId): int;
    public function registerUserAnswer(int $userId, int $quizId, int $quizQuestionId, int $quizAnswerId): void;
    public function getUserAnswers(int $userId, int $quizId): array;
    public function getUser(int $userId): array;
    public function storeUserResult(int $userId, int $correctAnswers, int $questionsCount): void;
}