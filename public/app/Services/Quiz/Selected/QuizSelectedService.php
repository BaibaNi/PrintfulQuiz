<?php
namespace App\Services\Quiz\Selected;

use App\Models\Quiz;
use App\Repositories\Quiz\QuizRepository;

class QuizSelectedService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function execute(QuizSelectedRequest $request): Quiz
    {
        $selectedQuiz = $this->quizRepository->getSelectedQuiz($request->getQuizId());
        $quizQuestions = $this->quizRepository->getQuestions($request->getQuizId());
        $quizAnswers = $this->quizRepository->getAnswers($request->getQuizId());

        return new Quiz($selectedQuiz, $quizQuestions, $quizAnswers);
    }

}