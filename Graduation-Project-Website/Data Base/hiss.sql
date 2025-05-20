-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 03:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`Id`, `UserId`, `QuestionId`, `Answer`) VALUES
(131, 21, 1, 'نعم'),
(132, 21, 2, 'نعم'),
(133, 21, 3, 'نعم'),
(134, 21, 4, 'نعم'),
(135, 21, 5, 'نعم'),
(136, 21, 6, 'نعم'),
(137, 21, 7, 'نعم'),
(138, 21, 8, 'لا '),
(139, 21, 9, 'لا'),
(140, 21, 10, 'لا');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Id` int(11) NOT NULL,
  `Question` varchar(512) NOT NULL,
  `A1` varchar(255) NOT NULL,
  `A2` varchar(255) NOT NULL,
  `A3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Id`, `Question`, `A1`, `A2`, `A3`) VALUES
(1, 'هل الروبوت يحل محل الانسان في معظم الاعمال؟', 'نعم', 'لا', 'الي حداً ما'),
(2, 'هل يمكنك الاعتماد علي الروبوت في اعمالك اليومية؟', 'نعم', 'لا', 'الي حداً ما'),
(3, 'هل تخشى أن يؤدي التطور التكنولوجي إلى فقدان الوظائف بسبب تبني الروبوتات لأدوار العمل', 'نعم', 'لا', 'الي حداً ما'),
(4, 'هل ترى أن هناك حاجة لتنظيم أو قيود على استخدام الروبوتات في المجتمع؟', 'نعم', 'لا', 'الي حداً ما'),
(5, 'هل تعتقد أن الروبوتات يمكن أن تسهم في تقليل الأخطاء البشرية في مجالات مثل الطب والصناعة؟', 'نعم', 'لا', 'الي حداً ما'),
(6, 'هل تعتقد أن يجب على الروبوتات أن تكون مبرمجة بقوانين أخلاقية؟.', 'نعم', 'لا', 'الي حداً ما'),
(7, 'هل تعتقد أن الروبوتات يمكن أن تؤثر على العلاقات الاجتماعية والإنسانية؟', 'نعم', 'لا ', 'الي حداً ما'),
(8, 'هل تعتقد أن الروبوتات يمكن أن تؤثر على العلاقات الاجتماعية والإنسانية؟', 'نعم ', 'لا ', 'الي حداً ما'),
(9, 'هل تعتقد أن يمكن أن تؤدي الروبوتات إلى توجيه التفكير الإنساني في اتجاهات جديدة؟', 'نعم', 'لا', 'الي حداً ما'),
(10, 'هل تعتقد أن الروبوتات يمكن أن تساهم في تحسين جودة الحياة البشرية بشكل عام؟', 'نعم', 'لا', 'الي حداً ما');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(512) DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `name`, `username`, `password`, `email`, `phone`) VALUES
(1, '', 'Moshira ashraf bahy', '32435367', 'moshira@gmail.com', '0113456733'),
(2, '', 'Mariam Badr Mohamed', '131158101', 'remo@gmail.com', '01123934564'),
(3, '', 'omar wael elsaleh', '123456', 'omar27@gmail.com', '01020209499'),
(4, '', 'Nada yasser mohamed ', '123455', 'nada123@gmail.com', '01023297694'),
(5, '', 'ahmed hussein mohamed', '123445', 'ahmedhusein12@gmail.com', '01003331347'),
(6, '', 'taha elshemy mostafa', '1234566', 'tahashemy12@gmail.com', '01004031157'),
(7, '', 'Rana mohamed fathy', '12344', 'Ranamohamed12@gmail.com', '01003254827'),
(8, '', 'mohamed nabil qarni', '1234455', 'mohamednabil12@gmail.com', '0109079435'),
(9, '', 'mostafa ahmed rashad ', '1234555', 'mostafa_ahmed12@gmail.com', '01110365641'),
(10, '', 'abdelrahman mohamed hussein', '12334', 'adbdelrahman_mohamed12@gmail.com', '011156071758'),
(11, '', 'yousef rabie yehia ', '11234', 'yousef_rabie12@gmail.com', '01012826825'),
(12, '', 'mariam samer maher', '12233', 'mariam_samer12@gmail.com', '01550068880'),
(13, '', 'raghda mohamed ashraf', '12234', 'raghda_mohamed12@gmail.com', '01017931690'),
(14, '', 'hager ahmed mohamed', '1234555', 'hager_ahmed12@gmail.com', '01142255766'),
(15, '', 'mona hamed mohamed ', '11234', 'mona_hamed112@gmail.com', '01114916549'),
(16, '', 'hady magdy mahmod ', '1234555', 'hady_magdy12@gmail.com', '01024066760'),
(17, '', 'mohamed moatamed mohamed', '11223', 'mohamed_m122@gmail.com', '01115403881'),
(18, '', 'mariam mohamed mousa ', '12340', 'mariam_mohamed112@gmail.com', '01128577759'),
(19, '', 'kirles  hany lwis', '11223', 'kirles_hany112@gmail.com', '01215667'),
(20, '', 'eslam mahmoud helmy', '112233', 'eslam_mahmoud112@gmail.com', ''),
(21, 'abanoub michiel', 'abanoub', '123', 'abanoub@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
