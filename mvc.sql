
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `feedback_statuses` (
  `id` int(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(10) NOT NULL
); 

INSERT INTO `feedback_statuses` (`id`, `name`) VALUES
(1, 'waiting'),
(2, 'answered'),
(3, 'rejected');

CREATE TABLE IF NOT EXISTS `feedback_types` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(45) NOT NULL
); 

INSERT INTO `feedback_types` (`id`, `name`) VALUES
(1, 'complaint'),
(4, 'other'),
(2, 'question'),
(3, 'remark');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `type` int(11) DEFAULT '0'
); 

INSERT INTO `users` (`id`, `username`, `pass`, `type`) VALUES
(1, '1', '1', 1),
(2, '2', '2', 2);

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(45) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `status_id` int(1) UNSIGNED DEFAULT 1,
  `created_at` timestamp NOT NULL,
  
	FOREIGN KEY (type_id)       REFERENCES feedback_types(id),
	FOREIGN KEY (status_id)       REFERENCES feedback_statuses(id)
); 