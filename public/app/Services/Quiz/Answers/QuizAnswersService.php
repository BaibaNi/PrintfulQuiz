<?php
namespace App\Services\Quiz\Answers;

use App\Repositories\Quiz\QuizRepository;

class QuizAnswersService
{
    private QuizRepository $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function execute(QuizAnswersRequest $request): array
    {
        $answers = [];
        $rawAnswers = $this->quizRepository->getAnswers($request->getQuizId());

        foreach ($rawAnswers as $answer) {
            if($answer['is_correct']){
                $answers[$answer['question_id']] = $answer['id'];
            }
        }

        return $answers;
    }
}