<?php

declare(strict_types=1);

namespace Tests;

use Phoenix\Migration\AbstractMigration;

final class TestQuizzesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `test_quizzes` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255),
                `is_available` bool NOT NULL DEFAULT false,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            
            INSERT INTO test_quizzes(name, is_available) VALUES (\'1st Quiz\', true);
            INSERT INTO test_quizzes(name, is_available) VALUES (\'2nd Quiz\', false);
            INSERT INTO test_quizzes(name, is_available) VALUES (\'3rd Quiz\', true);
        ');
    }

    protected function down(): void
    {
        $this->table('test_quizzes')
            ->drop();
    }
}
