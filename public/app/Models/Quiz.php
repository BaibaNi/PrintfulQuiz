<?php

namespace App\Models;

class Quiz
{
    private array $selectedQuiz;
    private array $quizQuestions;
    private array $quizAnswers;

    public function __construct(array $selectedQuiz, array $quizQuestions, array $quizAnswers)
    {
        $this->selectedQuiz = $selectedQuiz;
        $this->quizQuestions = $quizQuestions;
        $this->quizAnswers = $quizAnswers;
    }

    /**
     * @return string
     */
    public function getQuizId(): int
    {
        return $this->selectedQuiz['id'];
    }

    /**
     * @return string
     */
    public function getQuizName(): string
    {
        return $this->selectedQuiz['name'];
    }

    /**
     * @return array
     */
    public function getQuestionsWithAnswers(): array
    {
        $questionsWithAnswers = [];
        foreach ($this->quizQuestions as $question){
            $questionsWithAnswers[] = [
                'quiz_id' => $this->getQuizId(),
                'question' => [$question['id'] => $question['question']],
                'answers' => (new QuestionAnswers($question['id'], $this->quizAnswers))->getAnswers(),
                'correctAnswer' => (new QuestionAnswers($question['id'], $this->quizAnswers))->getCorrectAnswer(),
            ];
        }

        return $questionsWithAnswers;
    }
}