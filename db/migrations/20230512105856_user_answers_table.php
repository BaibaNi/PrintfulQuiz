<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Migration\AbstractMigration;

final class UserAnswersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `user_answers` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) NOT NULL,
                `quiz_id` int(11) NOT NULL,
                `quiz_question_id` int(11),
                `quiz_answer_id` int(11),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ');
    }

    protected function down(): void
    {
        $this->table('user_answers')
            ->drop();
    }
}
