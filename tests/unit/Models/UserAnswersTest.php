<?php

namespace Tests\unit\Models;

use App\Models\UserAnswers;
use PHPUnit\Framework\TestCase;

class UserAnswersTest extends TestCase
{
    public function testCanGetQuizId(): void
    {
        $user = new UserAnswers(1);

        $this->assertSame(1, $user->getQuizId());
    }
}
