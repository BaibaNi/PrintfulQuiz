<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Migration\AbstractMigration;

final class QuizzesTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `quizzes` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255),
                `is_available` bool NOT NULL DEFAULT false,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            
            INSERT INTO quizzes(name, is_available) VALUES (\'1st Quiz\', true);
            INSERT INTO quizzes(name, is_available) VALUES (\'2nd Quiz\', false);
            INSERT INTO quizzes(name, is_available) VALUES (\'3rd Quiz\', true);
        ');
    }

    protected function down(): void
    {
        $this->table('quizzes')
            ->drop();
    }
}
