<?php
namespace App\Services\Quiz\List;

use App\Repositories\Quiz\QuizRepository;

class QuizListService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function execute(): array
    {
        return $this->quizRepository->getQuizzesList();
    }

}