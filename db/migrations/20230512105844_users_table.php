<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Migration\AbstractMigration;

final class UsersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `quiz_id` int(11) NOT NULL,
                `name` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ');
    }

    protected function down(): void
    {
        $this->table('users')
            ->drop();
    }
}
