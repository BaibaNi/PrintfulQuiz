<?php

namespace Tests\unit\Models;

use App\Models\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    private array $selectedQuiz = [
        'id' => 3,
        'name' => "3rd test Quiz",
        'is_available' => 1
    ];

    private array $quizQuestions  = [
        [
            'id' => 6,
            'quiz_id' => 3,
            'question' => "1st Question Quiz 3"
        ]
    ];

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
        [
            'quiz_id' => 3,
            'question' => [
                6 => "1st Question Quiz 3"
            ],
            'answers' => [
                16 => "1st Answer Q3, Q1",
                17 => "2nd Answer Q3, Q1",
                18 => "3rd Answer Q3, Q1",
                19 => "4th Answer Q3, Q1",
                20 => "5th Answer Q3, Q1"
            ],
            'correctAnswer' => 19
        ]
    ];

    public function testCanGetQuizId(): void
    {
        $quiz = new Quiz($this->selectedQuiz, $this->quizQuestions, $this->quizAnswers);

        $this->assertSame(3, $quiz->getQuizId());
    }

    public function testCanGetQuizName(): void
    {
        $quiz = new Quiz($this->selectedQuiz, $this->quizQuestions, $this->quizAnswers);

        $this->assertSame("3rd test Quiz", $quiz->getQuizName());
    }

    public function testCanGetQuestionsWithAnswers(): void
    {
        $quiz = new Quiz($this->selectedQuiz, $this->quizQuestions, $this->quizAnswers);

        $this->assertSame($this->expectedAnswers, $quiz->getQuestionsWithAnswers());
    }
}
