-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table printful.phoenix_log
CREATE TABLE IF NOT EXISTS `phoenix_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration_datetime` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `executed_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table printful.phoenix_log: ~7 rows (approximately)
/*!40000 ALTER TABLE `phoenix_log` DISABLE KEYS */;
INSERT INTO `phoenix_log` (`id`, `migration_datetime`, `classname`, `executed_at`) VALUES
	(1, '20230419081518', '\\Migrations\\First', '2023-05-12 08:12:21'),
	(38, '20230512101410', '\\Migrations\\QuizzesTable', '2023-05-16 13:02:00'),
	(39, '20230512105844', '\\Migrations\\UsersTable', '2023-05-16 13:02:01'),
	(40, '20230512105856', '\\Migrations\\UserAnswersTable', '2023-05-16 13:02:01'),
	(41, '20230512125044', '\\Migrations\\QuizQuestionsTable', '2023-05-16 13:02:01'),
	(42, '20230512125054', '\\Migrations\\QuizAnswersTable', '2023-05-16 13:02:01'),
	(43, '20230514181428', '\\Migrations\\UserResultsTable', '2023-05-16 13:02:01'),
	(44, '20230516124207', '\\Tests\\TestQuizzesTable', '2023-05-16 13:02:01'),
	(45, '20230516124221', '\\Tests\\TestUsersTable', '2023-05-16 13:02:01'),
	(46, '20230516124244', '\\Tests\\TestUserAnswersTable', '2023-05-16 13:02:02'),
	(47, '20230516124259', '\\Tests\\TestQuizAnswersTable', '2023-05-16 13:02:02'),
	(48, '20230516124309', '\\Tests\\TestQuizQuestionsTable', '2023-05-16 13:02:02'),
	(49, '20230516124324', '\\Tests\\TestUserResultsTable', '2023-05-16 13:02:02');
/*!40000 ALTER TABLE `phoenix_log` ENABLE KEYS */;

-- Dumping structure for table printful.quizzes
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.quizzes: ~2 rows (approximately)
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` (`id`, `name`, `is_available`) VALUES
	(1, '1st test Quiz', 1),
	(2, '2nd test Quiz', 0),
	(3, '3rd test Quiz', 1);
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;

-- Dumping structure for table printful.quiz_answers
CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.quiz_answers: ~30 rows (approximately)
/*!40000 ALTER TABLE `quiz_answers` DISABLE KEYS */;
INSERT INTO `quiz_answers` (`id`, `quiz_id`, `question_id`, `answer`, `is_correct`) VALUES
	(1, 1, 1, '1st Answer Quiz 1, Question 1', 1),
	(2, 1, 1, '2nd Answer Quiz 1, Question 1', 0),
	(3, 1, 1, '3rd Answer Quiz 1, Question 1', 0),
	(4, 1, 1, '4th Answer Quiz 1, Question 1', 0),
	(5, 1, 2, '1st Answer Quiz 1, Question 2', 1),
	(6, 1, 2, '2nd Answer Quiz 1, Question 2', 0),
	(7, 1, 2, '3rd Answer Quiz 1, Question 2', 0),
	(8, 1, 3, '1st Answer Quiz 1, Question 3', 1),
	(9, 1, 3, '2nd Answer Quiz 1, Question 3', 0),
	(10, 1, 3, '3rd Answer Quiz 1, Question 3', 0),
	(11, 2, 4, '1st Answer Quiz 2, Question 1', 0),
	(12, 2, 4, '2nd Answer Quiz 2, Question 1', 1),
	(13, 2, 5, '1st Answer Quiz 2, Question 2', 0),
	(14, 2, 5, '2nd Answer Quiz 2, Question 2', 1),
	(15, 2, 5, '3rd Answer Quiz 2, Question 2', 1),
	(16, 3, 6, '1st Answer Quiz 3, Question 1', 0),
	(17, 3, 6, '2nd Answer Quiz 3, Question 1', 0),
	(18, 3, 6, '3rd Answer Quiz 3, Question 1', 0),
	(19, 3, 6, '4th Answer Quiz 3, Question 1', 1),
	(20, 3, 6, '5th Answer Quiz 3, Question 1', 0),
	(21, 3, 7, '1st Answer Quiz 3, Question 2', 0),
	(22, 3, 7, '2nd Answer Quiz 3, Question 2', 1),
	(23, 3, 7, '3rd Answer Quiz 3, Question 2', 0),
	(24, 3, 8, '1st Answer Quiz 3, Question 3', 0),
	(25, 3, 8, '2nd Answer Quiz 3, Question 3', 1),
	(26, 3, 9, '1st Answer Quiz 3, Question 4', 1),
	(27, 3, 9, '2nd Answer Quiz 3, Question 4', 0),
	(28, 3, 9, '3rd Answer Quiz 3, Question 4', 0),
	(29, 3, 9, '4th Answer Quiz 3, Question 4', 0),
	(30, 3, 9, '5th Answer Quiz 3, Question 4', 0);
/*!40000 ALTER TABLE `quiz_answers` ENABLE KEYS */;

-- Dumping structure for table printful.quiz_questions
CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.quiz_questions: ~9 rows (approximately)
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question`) VALUES
	(1, 1, '1st Question Quiz 1'),
	(2, 1, '2nd Question Quiz 1'),
	(3, 1, '3rd Question Quiz 1'),
	(4, 2, '1st Question Quiz 2'),
	(5, 2, '2nd Question Quiz 2'),
	(6, 3, '1st Question Quiz 3'),
	(7, 3, '2nd Question Quiz 3'),
	(8, 3, '3rd Question Quiz 3'),
	(9, 3, '4th Question Quiz 3');
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;

-- Dumping structure for table printful.test_quizzes
CREATE TABLE IF NOT EXISTS `test_quizzes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_quizzes: ~3 rows (approximately)
/*!40000 ALTER TABLE `test_quizzes` DISABLE KEYS */;
INSERT INTO `test_quizzes` (`id`, `name`, `is_available`) VALUES
	(1, '1st test Quiz', 1),
	(2, '2nd test Quiz', 0),
	(3, '3rd test Quiz', 1);
/*!40000 ALTER TABLE `test_quizzes` ENABLE KEYS */;

-- Dumping structure for table printful.test_quiz_answers
CREATE TABLE IF NOT EXISTS `test_quiz_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_quiz_answers: ~30 rows (approximately)
/*!40000 ALTER TABLE `test_quiz_answers` DISABLE KEYS */;
INSERT INTO `test_quiz_answers` (`id`, `quiz_id`, `question_id`, `answer`, `is_correct`) VALUES
	(1, 1, 1, '1st Answer Quiz 1, Question 1', 1),
	(2, 1, 1, '2nd Answer Quiz 1, Question 1', 0),
	(3, 1, 1, '3rd Answer Quiz 1, Question 1', 0),
	(4, 1, 1, '4th Answer Quiz 1, Question 1', 0),
	(5, 1, 2, '1st Answer Quiz 1, Question 2', 1),
	(6, 1, 2, '2nd Answer Quiz 1, Question 2', 0),
	(7, 1, 2, '3rd Answer Quiz 1, Question 2', 0),
	(8, 1, 3, '1st Answer Quiz 1, Question 3', 1),
	(9, 1, 3, '2nd Answer Quiz 1, Question 3', 0),
	(10, 1, 3, '3rd Answer Quiz 1, Question 3', 0),
	(11, 2, 4, '1st Answer Quiz 2, Question 1', 0),
	(12, 2, 4, '2nd Answer Quiz 2, Question 1', 1),
	(13, 2, 5, '1st Answer Quiz 2, Question 2', 0),
	(14, 2, 5, '2nd Answer Quiz 2, Question 2', 1),
	(15, 2, 5, '3rd Answer Quiz 2, Question 2', 1),
	(16, 3, 6, '1st Answer Quiz 3, Question 1', 0),
	(17, 3, 6, '2nd Answer Quiz 3, Question 1', 0),
	(18, 3, 6, '3rd Answer Quiz 3, Question 1', 0),
	(19, 3, 6, '4th Answer Quiz 3, Question 1', 1),
	(20, 3, 6, '5th Answer Quiz 3, Question 1', 0),
	(21, 3, 7, '1st Answer Quiz 3, Question 2', 0),
	(22, 3, 7, '2nd Answer Quiz 3, Question 2', 1),
	(23, 3, 7, '3rd Answer Quiz 3, Question 2', 0),
	(24, 3, 8, '1st Answer Quiz 3, Question 3', 0),
	(25, 3, 8, '2nd Answer Quiz 3, Question 3', 1),
	(26, 3, 9, '1st Answer Quiz 3, Question 4', 1),
	(27, 3, 9, '2nd Answer Quiz 3, Question 4', 0),
	(28, 3, 9, '3rd Answer Quiz 3, Question 4', 0),
	(29, 3, 9, '4th Answer Quiz 3, Question 4', 0),
	(30, 3, 9, '5th Answer Quiz 3, Question 4', 0);
/*!40000 ALTER TABLE `test_quiz_answers` ENABLE KEYS */;

-- Dumping structure for table printful.test_quiz_questions
CREATE TABLE IF NOT EXISTS `test_quiz_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_quiz_questions: ~9 rows (approximately)
/*!40000 ALTER TABLE `test_quiz_questions` DISABLE KEYS */;
INSERT INTO `test_quiz_questions` (`id`, `quiz_id`, `question`) VALUES
	(1, 1, '1st Question Quiz 1'),
	(2, 1, '2nd Question Quiz 1'),
	(3, 1, '3rd Question Quiz 1'),
	(4, 2, '1st Question Quiz 2'),
	(5, 2, '2nd Question Quiz 2'),
	(6, 3, '1st Question Quiz 3'),
	(7, 3, '2nd Question Quiz 3'),
	(8, 3, '3rd Question Quiz 3'),
	(9, 3, '4th Question Quiz 3');
/*!40000 ALTER TABLE `test_quiz_questions` ENABLE KEYS */;

-- Dumping structure for table printful.test_users
CREATE TABLE IF NOT EXISTS `test_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `test_users` DISABLE KEYS */;
INSERT INTO `test_users` (`id`, `quiz_id`, `name`) VALUES
	(1, 1, 'Test User');
/*!40000 ALTER TABLE `test_users` ENABLE KEYS */;

-- Dumping structure for table printful.test_user_answers
CREATE TABLE IF NOT EXISTS `test_user_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `quiz_question_id` int DEFAULT NULL,
  `quiz_answer_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_user_answers: ~3 rows (approximately)
/*!40000 ALTER TABLE `test_user_answers` DISABLE KEYS */;
INSERT INTO `test_user_answers` (`id`, `user_id`, `quiz_id`, `quiz_question_id`, `quiz_answer_id`) VALUES
	(1, 1, 1, 1, 2),
	(2, 1, 1, 2, 5),
	(3, 1, 1, 3, 8);
/*!40000 ALTER TABLE `test_user_answers` ENABLE KEYS */;

-- Dumping structure for table printful.test_user_results
CREATE TABLE IF NOT EXISTS `test_user_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `correct_answers` int NOT NULL,
  `questions_count` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.test_user_results: ~1 rows (approximately)
/*!40000 ALTER TABLE `test_user_results` DISABLE KEYS */;
INSERT INTO `test_user_results` (`id`, `user_id`, `correct_answers`, `questions_count`) VALUES
	(1, 1, 2, 3);
/*!40000 ALTER TABLE `test_user_results` ENABLE KEYS */;

-- Dumping structure for table printful.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `quiz_id`, `name`) VALUES
	(1, 1, 'Test Name');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table printful.user_answers
CREATE TABLE IF NOT EXISTS `user_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `quiz_question_id` int DEFAULT NULL,
  `quiz_answer_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.user_answers: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_answers` DISABLE KEYS */;
INSERT INTO `user_answers` (`id`, `user_id`, `quiz_id`, `quiz_question_id`, `quiz_answer_id`) VALUES
	(1, 1, 1, 1, 1),
	(2, 1, 1, 2, 6),
	(3, 1, 1, 3, 10),
	(4, 1, 1, 1, 1),
	(5, 1, 1, 2, 6),
	(6, 1, 1, 3, 10);
/*!40000 ALTER TABLE `user_answers` ENABLE KEYS */;

-- Dumping structure for table printful.user_results
CREATE TABLE IF NOT EXISTS `user_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `correct_answers` int NOT NULL,
  `questions_count` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table printful.user_results: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_results` DISABLE KEYS */;
INSERT INTO `user_results` (`id`, `user_id`, `correct_answers`, `questions_count`) VALUES
	(1, 1, 3, 3),
	(2, 1, 1, 3);
/*!40000 ALTER TABLE `user_results` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
