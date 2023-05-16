<?php

declare(strict_types=1);

namespace Tests;

use Phoenix\Migration\AbstractMigration;

final class TestUserAnswersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `test_user_answers` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) NOT NULL,
                `quiz_id` int(11) NOT NULL,
                `quiz_question_id` int(11),
                `quiz_answer_id` int(11),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            INSERT INTO test_user_answers(user_id, quiz_id, quiz_question_id, quiz_answer_id) VALUES (1, 1, 1, 2);
            INSERT INTO test_user_answers(user_id, quiz_id, quiz_question_id, quiz_answer_id) VALUES (1, 1, 2, 5);
            INSERT INTO test_user_answers(user_id, quiz_id, quiz_question_id, quiz_answer_id) VALUES (1, 1, 3, 8);
        ');
    }

    protected function down(): void
    {
        $this->table('test_user_answers')
            ->drop();
    }
}
