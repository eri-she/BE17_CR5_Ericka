-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2022 at 04:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE17_CR5_animal_adoption_Ericka`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `breed`, `description`, `age`, `picture`) VALUES
(1, 'Tony', 'poodle', 'Poodles are extremely intelligent and are easily trained. ', 5, 'dog.png'),
(8, 'Mono', 'Labrador', 'Labs are friendly, outgoing, and high-spirited companions who have more than enough affection to go around for a family looking for a medium-to-large dog', 9, 'dog.png'),
(9, 'Lucas', 'Chihuaha', 'The Chihuahua is a balanced, graceful dog of terrier-like demeanor, weighing no more than 6 pounds. The rounded \"apple\" head is a breed hallmark. The erect ears and full, luminous eyes are acutely expressive.', 6, 'dog.png'),
(10, 'Puky', 'Terry', 'Their feisty, mischievous personality and energetic nature. Terriers are highly intelligent and trainable,and are suited for people with patience and a great sense of humour.', 8, 'dog.png'),
(11, 'Rumina', 'Rottweiler', 'The Rottweiler is a robust working breed of great strength descended from the mastiffs of the Roman legions', 10, 'dog.png'),
(12, 'Kavo', 'Chihuaha', 'The Chihuahua is a balanced, graceful dog of terrier-like demeanor, weighing no more than 6 pounds.', 11, 'dog.png'),
(13, 'Roby', 'Golden', 'The Golden Retriever is a sturdy, muscular dog of medium size, famous for the dense, lustrous coat of gold that gives the breed its name.', 14, 'dog.png'),
(14, 'Pisho', 'Husky', 'The Siberian husky is a medium-sized dog, slightly longer than tall. Height ranges from 20 to 23 1/2 inches and weight from 35 to 60 pounds.', 3, 'dog.png'),
(15, 'Rufi', 'Boxer', 'Loyalty, affection, intelligence, work ethic, and good looks: Boxers are the whole doggy package. Bright and alert, sometimes silly, but always courageous.', 9, 'dog.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `email`, `picture`, `status`) VALUES
(1, 'Susana', 'Perez', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'susana@gmail.com', 'avatar.png', 'adm'),
(2, 'John', 'Wilson', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'wilson@gmail.com', 'avatar.png', 'user'),
(4, 'Regina', 'rosa', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'regina@gmail.com', 'avatar.png', 'user'),
(5, 'roma', 'roma', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'rom@gmail.com', 'avatar.png', 'user'),
(6, 'Lalo', 'Mayer', 'fcf3e61d45d82dffb8bf5e0d31ec1a37334624db53e4b08407b5606a04b38231', 'lalo@gmail.com', 'avatar.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
