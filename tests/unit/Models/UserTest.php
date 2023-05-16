<?php

namespace Tests\unit\Models;

use App\Models\Quiz;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCanGetName(): void
    {
        $user = new User('Test Name');

        $this->assertSame('Test Name', $user->getName());
    }
}
