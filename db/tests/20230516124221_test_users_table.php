<?php

declare(strict_types=1);

namespace Tests;

use Phoenix\Migration\AbstractMigration;

final class TestUsersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `test_users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `quiz_id` int(11) NOT NULL,
                `name` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            INSERT INTO test_users(quiz_id, name) VALUES (1, \'Test User\');
        ');
    }

    protected function down(): void
    {
        $this->table('test_users')
            ->drop();
    }
}
