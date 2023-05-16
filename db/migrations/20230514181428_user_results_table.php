<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Migration\AbstractMigration;

final class UserResultsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `user_results` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) NOT NULL,
                `correct_answers` int(11) NOT NULL,
                `questions_count` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ');
    }

    protected function down(): void
    {
        $this->table('user_results')
            ->drop();
    }
}
