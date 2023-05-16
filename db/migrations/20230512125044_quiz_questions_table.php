<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Migration\AbstractMigration;

final class QuizQuestionsTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `quiz_questions` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `quiz_id` int(11) NOT NULL,
                `question` varchar(255),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

            
            INSERT INTO quiz_questions(quiz_id, question) VALUES (1, \'1st Question Quiz 1\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (1, \'2nd Question Quiz 1\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (1, \'3rd Question Quiz 1\');

            INSERT INTO quiz_questions(quiz_id, question) VALUES (2, \'1st Question Quiz 2\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (2, \'2nd Question Quiz 2\');

            INSERT INTO quiz_questions(quiz_id, question) VALUES (3, \'1st Question Quiz 3\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (3, \'2nd Question Quiz 3\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (3, \'3rd Question Quiz 3\');
            INSERT INTO quiz_questions(quiz_id, question) VALUES (3, \'4th Question Quiz 3\');
        ');
    }

    protected function down(): void
    {
        $this->table('quiz_questions')
            ->drop();
    }
}
