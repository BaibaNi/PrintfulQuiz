<?php

declare(strict_types=1);

namespace Tests;

use Phoenix\Migration\AbstractMigration;

final class TestUserResultsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `test_user_results` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) NOT NULL,
                `correct_answers` int(11) NOT NULL,
                `questions_count` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            INSERT INTO test_user_results(user_id, correct_answers, questions_count) VALUES (1, 2, 3);
        ');
    }

    protected function down(): void
    {
        $this->table('test_user_results')
            ->drop();
    }
}
