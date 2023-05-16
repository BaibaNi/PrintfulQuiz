<?php

namespace Tests\unit\Models;

use App\Models\QuestionAnswers;
use PHPUnit\Framework\TestCase;

class QuestionAnswersTest extends TestCase
{
    private int $questionId = 6;
    private array $quizAnswers  = [
        [
            'id' => 16,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "1st Answer Q3, Q1",
            'is_correct' => 0
        ],
        [
            'id' => 17,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "2nd Answer Q3, Q1",
            'is_correct' => 0
        ],
        [
            'id' => 18,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "3rd Answer Q3, Q1",
            'is_correct' => 0
        ],
        [
            'id' => 19,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "4th Answer Q3, Q1",
            'is_correct' => 1
        ],
        [
            'id' => 20,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "5th Answer Q3, Q1",
            'is_correct' => 0
        ],
    ];

    private array $expectedAnswers = [
        16 => "1st Answer Q3, Q1",
        17 => "2nd Answer Q3, Q1",
        18 => "3rd Answer Q3, Q1",
        19 => "4th Answer Q3, Q1",
        20 => "5th Answer Q3, Q1"
    ];

    private int $expectedCorrectAnswer = 19;

    public function testCanGetQuestionId(): void
    {
        $qa = new QuestionAnswers($this->questionId, $this->quizAnswers);
        $this->assertSame(6, $qa->getQuestionId());
    }

    public function testCanGetAnswers(): void
    {
        $qa = new QuestionAnswers($this->questionId, $this->quizAnswers);
        $this->assertSame($this->expectedAnswers, $qa->getAnswers());
    }

    public function testCanGetCorrectAnswer(): void
    {
        $qa = new QuestionAnswers($this->questionId, $this->quizAnswers);
        $this->assertSame($this->expectedCorrectAnswer, $qa->getCorrectAnswer());
    }
}
