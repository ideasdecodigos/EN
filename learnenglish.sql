-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 05:13 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnenglish`
--

-- --------------------------------------------------------

--
-- Table structure for table `answersforo`
--

CREATE TABLE `answersforo` (
  `idanswer` int(11) NOT NULL,
  `idforo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `idreplay` int(11) DEFAULT NULL,
  `txtreplay` text,
  `dateanswer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatpublico`
--

CREATE TABLE `chatpublico` (
  `idchat` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `idreplay` int(11) DEFAULT NULL,
  `mensaje` longtext NOT NULL,
  `txtreplay` text,
  `fechachat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `idchat` int(11) NOT NULL,
  `mensaje` longtext COLLATE utf8mb4_bin NOT NULL,
  `idreplay` int(11) DEFAULT NULL,
  `txtreplay` text COLLATE utf8mb4_bin,
  `admin` int(11) NOT NULL,
  `costum` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8mb4_bin NOT NULL DEFAULT 'N',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idcomment` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_bin NOT NULL,
  `idreplay` int(11) DEFAULT NULL,
  `txtreplay` text COLLATE utf8mb4_bin,
  `tags` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `idcontent` int(11) NOT NULL,
  `topic` longtext COLLATE utf8mb4_bin,
  `description` longtext COLLATE utf8mb4_bin,
  `categories` mediumtext COLLATE utf8mb4_bin,
  `type` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `level` varchar(5) COLLATE utf8mb4_bin NOT NULL DEFAULT 'all',
  `student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `idconversation` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `person` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `english` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `spanish` mediumtext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `orden` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idtopic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `foro`
--

CREATE TABLE `foro` (
  `idforo` int(11) NOT NULL,
  `question` longtext COLLATE utf8mb4_bin NOT NULL,
  `student` int(11) NOT NULL,
  `dateforo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `idfriend` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `idhistory` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newslatters`
--

CREATE TABLE `newslatters` (
  `code` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phrasalverb`
--

CREATE TABLE `phrasalverb` (
  `idverb` int(11) NOT NULL,
  `fvenglish` text COLLATE utf8mb4_bin NOT NULL,
  `fvspanish` text COLLATE utf8mb4_bin NOT NULL,
  `fvdescription` mediumtext COLLATE utf8mb4_bin,
  `fvlevel` int(11) NOT NULL,
  `fvdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `idscore` int(11) NOT NULL,
  `score` double NOT NULL,
  `codeStudent` int(11) NOT NULL,
  `codechallenge` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trophy` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idstudent` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `cel` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT 'USA',
  `mail` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `pass` longtext COLLATE utf8mb4_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` int(5) NOT NULL DEFAULT '1',
  `foto` longtext COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `subcontents`
--

CREATE TABLE `subcontents` (
  `idsubcontent` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `english` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `spanish` mediumtext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answersforo`
--
ALTER TABLE `answersforo`
  ADD PRIMARY KEY (`idanswer`),
  ADD KEY `idforo` (`idforo`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `chatpublico`
--
ALTER TABLE `chatpublico`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `user` (`student`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `admin` (`admin`),
  ADD KEY `costum` (`costum`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idpost` (`idpost`),
  ADD KEY `idstudent` (`student`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`idcontent`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`idconversation`),
  ADD KEY `idpost` (`idpost`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `idtopic` (`idtopic`);

--
-- Indexes for table `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`idforo`),
  ADD KEY `user` (`student`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`idfriend`),
  ADD KEY `following` (`following`),
  ADD KEY `followed` (`followed`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`idhistory`),
  ADD KEY `idpost` (`idpost`);

--
-- Indexes for table `newslatters`
--
ALTER TABLE `newslatters`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `phrasalverb`
--
ALTER TABLE `phrasalverb`
  ADD PRIMARY KEY (`idverb`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`idscore`),
  ADD KEY `codeStudent` (`codeStudent`),
  ADD KEY `codechallenge` (`codechallenge`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idstudent`);

--
-- Indexes for table `subcontents`
--
ALTER TABLE `subcontents`
  ADD PRIMARY KEY (`idsubcontent`),
  ADD KEY `idword` (`idpost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answersforo`
--
ALTER TABLE `answersforo`
  MODIFY `idanswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `chatpublico`
--
ALTER TABLE `chatpublico`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `idcontent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `idconversation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foro`
--
ALTER TABLE `foro`
  MODIFY `idforo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `idfriend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `idhistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2492;

--
-- AUTO_INCREMENT for table `newslatters`
--
ALTER TABLE `newslatters`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phrasalverb`
--
ALTER TABLE `phrasalverb`
  MODIFY `idverb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `idscore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subcontents`
--
ALTER TABLE `subcontents`
  MODIFY `idsubcontent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answersforo`
--
ALTER TABLE `answersforo`
  ADD CONSTRAINT `answersforo_ibfk_1` FOREIGN KEY (`idforo`) REFERENCES `foro` (`idforo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `answersforo_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `chatpublico`
--
ALTER TABLE `chatpublico`
  ADD CONSTRAINT `chatpublico_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`costum`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `contents` (`idcontent`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`student`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `contents` (`idcontent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`idtopic`) REFERENCES `contents` (`idcontent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`following`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`followed`) REFERENCES `students` (`idstudent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `contents` (`idcontent`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `subcontents`
--
ALTER TABLE `subcontents`
  ADD CONSTRAINT `subcontents_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `contents` (`idcontent`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
