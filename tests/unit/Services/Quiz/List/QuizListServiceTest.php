<?php

namespace Tests\unit\Services\Quiz\List;

use App\Repositories\Quiz\DbalTestQuizRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Services\Quiz\List\QuizListService;
use PHPUnit\Framework\TestCase;

class QuizListServiceTest extends TestCase
{

    private array $expectedQuizzesList = [
        0 => [
            'id' => 1,
            'name' => "1st Quiz",
            'is_available' => 1
        ],
        1 => [
            'id' => 3,
            'name' => "3rd Quiz",
            'is_available' => 1
        ]
    ];

    public function testCanGetQuizzesList(): void
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions([
            QuizRepository::class => \DI\create(DbalTestQuizRepository::class),
        ]);
        $container = $builder->build();

        $service = $container->get(QuizListService::class);
        $this->assertSame($this->expectedQuizzesList, $service->execute());
    }

}
