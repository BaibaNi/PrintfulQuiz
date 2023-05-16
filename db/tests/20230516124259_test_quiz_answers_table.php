<?php

declare(strict_types=1);

namespace Tests;

use Phoenix\Migration\AbstractMigration;

final class TestQuizAnswersTable extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('
            CREATE TABLE `test_quiz_answers` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `quiz_id` int(11) NOT NULL,
                `question_id` int(11) NOT NULL,
                `answer` varchar(255),
                `is_correct` bool NOT NULL DEFAULT false,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 1, \'1st Answer Quiz 1, Question 1\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 1, \'2nd Answer Quiz 1, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 1, \'3rd Answer Quiz 1, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 1, \'4th Answer Quiz 1, Question 1\', false);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 2, \'1st Answer Quiz 1, Question 2\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 2, \'2nd Answer Quiz 1, Question 2\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 2, \'3rd Answer Quiz 1, Question 2\', false);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 3, \'1st Answer Quiz 1, Question 3\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 3, \'2nd Answer Quiz 1, Question 3\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (1, 3, \'3rd Answer Quiz 1, Question 3\', false);


            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (2, 4, \'1st Answer Quiz 2, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (2, 4, \'2nd Answer Quiz 2, Question 1\', true);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (2, 5, \'1st Answer Quiz 2, Question 2\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (2, 5, \'2nd Answer Quiz 2, Question 2\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (2, 5, \'3rd Answer Quiz 2, Question 2\', true);


            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 6, \'1st Answer Quiz 3, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 6, \'2nd Answer Quiz 3, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 6, \'3rd Answer Quiz 3, Question 1\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 6, \'4th Answer Quiz 3, Question 1\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 6, \'5th Answer Quiz 3, Question 1\', false);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 7, \'1st Answer Quiz 3, Question 2\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 7, \'2nd Answer Quiz 3, Question 2\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 7, \'3rd Answer Quiz 3, Question 2\', false);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 8, \'1st Answer Quiz 3, Question 3\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 8, \'2nd Answer Quiz 3, Question 3\', true);

            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 9, \'1st Answer Quiz 3, Question 4\', true);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 9, \'2nd Answer Quiz 3, Question 4\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 9, \'3rd Answer Quiz 3, Question 4\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 9, \'4th Answer Quiz 3, Question 4\', false);
            INSERT INTO test_quiz_answers(quiz_id, question_id, answer, is_correct) VALUES (3, 9, \'5th Answer Quiz 3, Question 4\', false);
        ');
    }

    protected function down(): void
    {
        $this->table('test_quiz_answers')
            ->drop();
    }
}
