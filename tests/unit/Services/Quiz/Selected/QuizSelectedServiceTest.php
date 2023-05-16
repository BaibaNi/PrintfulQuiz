<?php

namespace Tests\unit\Services\Quiz\Selected;

use App\Models\Quiz;
use App\Repositories\Quiz\DbalTestQuizRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Services\Quiz\Selected\QuizSelectedRequest;
use App\Services\Quiz\Selected\QuizSelectedService;
use PHPUnit\Framework\TestCase;

class QuizSelectedServiceTest extends TestCase
{
    private array $selectedQuiz = [
        'id' => 3,
        'name' => "3rd Quiz",
        'is_available' => 1
    ];

    private array $quizQuestions  = [
        [
            'id' => 6,
            'quiz_id' => 3,
            'question' => "1st Question Quiz 3"
        ],
        [
            'id' => 7,
            'quiz_id' => 3,
            'question' => "2nd Question Quiz 3"
        ],
        [
            'id' => 8,
            'quiz_id' => 3,
            'question' => "3rd Question Quiz 3"
        ],
        [
            'id' => 9,
            'quiz_id' => 3,
            'question' => "4th Question Quiz 3"
        ]
    ];

    private array $quizAnswers  = [
        [
            'id' => 16,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "1st Answer Quiz 3, Question 1",
            'is_correct' => 0
        ],
        [
            'id' => 17,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "2nd Answer Quiz 3, Question 1",
            'is_correct' => 0
        ],
        [
            'id' => 18,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "3rd Answer Quiz 3, Question 1",
            'is_correct' => 0
        ],
        [
            'id' => 19,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "4th Answer Quiz 3, Question 1",
            'is_correct' => 1
        ],
        [
            'id' => 20,
            'quiz_id' => 3,
            'question_id' => 6,
            'answer' => "5th Answer Quiz 3, Question 1",
            'is_correct' => 0
        ],
        [
            'id' => 21,
            'quiz_id' => 3,
            'question_id' => 7,
            'answer' => "1st Answer Quiz 3, Question 2",
            'is_correct' => 0
        ],
        [
            'id' => 22,
            'quiz_id' => 3,
            'question_id' => 7,
            'answer' => "2nd Answer Quiz 3, Question 2",
            'is_correct' => 1
        ],
        [
            'id' => 23,
            'quiz_id' => 3,
            'question_id' => 7,
            'answer' => "3rd Answer Quiz 3, Question 2",
            'is_correct' => 0
        ],
        [
            'id' => 24,
            'quiz_id' => 3,
            'question_id' => 8,
            'answer' => "1st Answer Quiz 3, Question 3",
            'is_correct' => 0
        ],
        [
            'id' => 25,
            'quiz_id' => 3,
            'question_id' => 8,
            'answer' => "2nd Answer Quiz 3, Question 3",
            'is_correct' => 1
        ],
        [
            'id' => 26,
            'quiz_id' => 3,
            'question_id' => 9,
            'answer' => "1st Answer Quiz 3, Question 4",
            'is_correct' => 1
        ],
        [
            'id' => 27,
            'quiz_id' => 3,
            'question_id' => 9,
            'answer' => "2nd Answer Quiz 3, Question 4",
            'is_correct' => 0
        ],
        [
            'id' => 28,
            'quiz_id' => 3,
            'question_id' => 9,
            'answer' => "3rd Answer Quiz 3, Question 4",
            'is_correct' => 0
        ],
        [
            'id' => 29,
            'quiz_id' => 3,
            'question_id' => 9,
            'answer' => "4th Answer Quiz 3, Question 4",
            'is_correct' => 0
        ],
        [
            'id' => 30,
            'quiz_id' => 3,
            'question_id' => 9,
            'answer' => "5th Answer Quiz 3, Question 4",
            'is_correct' => 0
        ],
    ];

    public function testCanGetSelectedQuiz(): void
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions([
            QuizRepository::class => \DI\create(DbalTestQuizRepository::class),
        ]);
        $container = $builder->build();

        $service = $container->get(QuizSelectedService::class);
        $request = new QuizSelectedRequest(3);

        $expectedQuiz = new Quiz($this->selectedQuiz, $this->quizQuestions, $this->quizAnswers);

        $this->assertSame($expectedQuiz->getQuizId(), $service->execute($request)->getQuizId());
        $this->assertSame($expectedQuiz->getQuizName(), $service->execute($request)->getQuizName());
        $this->assertSame($expectedQuiz->getQuestionsWithAnswers(), $service->execute($request)->getQuestionsWithAnswers());
    }
}
