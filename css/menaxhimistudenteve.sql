-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 11:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menaxhimistudenteve`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klaset`
--

CREATE TABLE `klaset` (
  `id_c` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `id_l` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klaset`
--

INSERT INTO `klaset` (`id_c`, `id_s`, `id_l`) VALUES
(1, 2007, 1),
(2, 2007, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lendet`
--

CREATE TABLE `lendet` (
  `id_l` int(30) NOT NULL,
  `name_l` varchar(30) NOT NULL,
  `semestri_l` int(30) NOT NULL,
  `profesorid_l` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lendet`
--

INSERT INTO `lendet` (`id_l`, `name_l`, `semestri_l`, `profesorid_l`) VALUES
(1, 'Internet', 1, 103),
(2, 'PI', 4, 103);

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id_p` int(30) NOT NULL,
  `name_p` varchar(100) NOT NULL,
  `surname_p` varchar(100) NOT NULL,
  `email_p` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` enum('profesor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id_p`, `name_p`, `surname_p`, `email_p`, `username`, `password`, `role`) VALUES
(100, 'Edona', 'Shala', 'edonashala@gmail.com', 'edona', '21232f297a57a5a743894a0e4a801fc3', 'profesor'),
(103, 'Dhurata', 'Ahmeti', 'dhurata@gmail.com', 'dhurata', '21232f297a57a5a743894a0e4a801fc3', 'profesor');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_s` int(11) NOT NULL,
  `name_s` varchar(100) NOT NULL,
  `surname_s` varchar(100) NOT NULL,
  `email_s` varchar(50) NOT NULL,
  `username_s` varchar(50) NOT NULL,
  `password_s` varchar(300) NOT NULL,
  `role` enum('student') NOT NULL,
  `semestri_s` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_s`, `name_s`, `surname_s`, `email_s`, `username_s`, `password_s`, `role`, `semestri_s`) VALUES
(2007, 'Valmira', 'Shala', 'valmirashala@gmail.com', 'valmira', '21232f297a57a5a743894a0e4a801fc3', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id_t` int(30) NOT NULL,
  `lendaid_t` int(30) NOT NULL,
  `profesorid_t` int(30) NOT NULL,
  `emri_t` varchar(200) NOT NULL,
  `datapublikimit_t` date NOT NULL,
  `deadline_t` date NOT NULL,
  `pershkrimi_t` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id_t`, `lendaid_t`, `profesorid_t`, `emri_t`, `datapublikimit_t`, `deadline_t`, `pershkrimi_t`) VALUES
(1, 1, 103, 'Raporti i projektit front-end', '2022-05-19', '2022-05-27', 'Qellimi i ketij punimi eshte qe studentet te jene ne gjendje te pershkruajne ecurine e punes, arsyen e zgjedhjes se atij projekti dhe po ashtu perparesite e punimit te tyre'),
(2, 2, 103, 'test', '2022-05-28', '2022-05-31', 'Dorezimi me 1 qershor');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_done`
--

CREATE TABLE `tasks_done` (
  `id_td` int(11) NOT NULL,
  `id_t` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `content_d` varchar(400) NOT NULL,
  `grade_d` enum('5','6','7','8','9','10') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks_done`
--

INSERT INTO `tasks_done` (`id_td`, `id_t`, `id_s`, `date_d`, `content_d`, `grade_d`) VALUES
(1, 1, 2007, '2022-05-26', 'projekti.pdf', '10'),
(2, 1, 2007, '2022-05-26', 'Essay_Edona Shala.docx', '7'),
(3, 2, 2007, '2022-05-29', 'logo riinvest.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klaset`
--
ALTER TABLE `klaset`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `lenda` (`id_l`),
  ADD KEY `studenti` (`id_s`);

--
-- Indexes for table `lendet`
--
ALTER TABLE `lendet`
  ADD PRIMARY KEY (`id_l`),
  ADD KEY `profesori-lenda` (`profesorid_l`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_p`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_p` (`email_p`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_s`),
  ADD UNIQUE KEY `username_s` (`username_s`),
  ADD UNIQUE KEY `email_s` (`email_s`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `lenda-task` (`lendaid_t`),
  ADD KEY `prof-task` (`profesorid_t`);

--
-- Indexes for table `tasks_done`
--
ALTER TABLE `tasks_done`
  ADD PRIMARY KEY (`id_td`),
  ADD KEY `idstudent` (`id_s`),
  ADD KEY `id_t` (`id_t`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klaset`
--
ALTER TABLE `klaset`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `id_l` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_p` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_t` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks_done`
--
ALTER TABLE `tasks_done`
  MODIFY `id_td` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klaset`
--
ALTER TABLE `klaset`
  ADD CONSTRAINT `lenda` FOREIGN KEY (`id_l`) REFERENCES `lendet` (`id_l`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studenti` FOREIGN KEY (`id_s`) REFERENCES `student` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lendet`
--
ALTER TABLE `lendet`
  ADD CONSTRAINT `profesori-lenda` FOREIGN KEY (`profesorid_l`) REFERENCES `profesor` (`id_p`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `lenda-task` FOREIGN KEY (`lendaid_t`) REFERENCES `lendet` (`id_l`) ON DELETE CASCADE,
  ADD CONSTRAINT `prof-task` FOREIGN KEY (`profesorid_t`) REFERENCES `lendet` (`profesorid_l`) ON DELETE CASCADE;

--
-- Constraints for table `tasks_done`
--
ALTER TABLE `tasks_done`
  ADD CONSTRAINT `idstudent` FOREIGN KEY (`id_s`) REFERENCES `student` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_done_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `tasks` (`id_t`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
