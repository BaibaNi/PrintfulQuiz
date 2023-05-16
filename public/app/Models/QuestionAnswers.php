<?php

namespace App\Models;

class QuestionAnswers
{
    private int $questionId;
    private array $answers;

    public function __construct(int $questionId, array $answers)
    {
        $this->questionId = $questionId;
        $this->answers = $answers;
    }

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        $answers = [];
        foreach ($this->answers as $answer){
            if($answer['question_id'] == $this->questionId){
                $answers[$answer['id']] = $answer['answer'];
            }
        }

        return $answers;
    }

    /**
     * @return int
     */
    public function getCorrectAnswer(): int
    {
        /** get ID of the correct answer */
        $correct = 0;
        foreach ($this->answers as $answer){
            if($answer['question_id'] == $this->questionId && $answer['is_correct']){
                $correct = $answer['id'];
                break;
            }
        }

        return $correct;
    }

}