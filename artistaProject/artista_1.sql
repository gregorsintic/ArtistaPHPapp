-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 11:53 PM
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
-- Database: `artista`
--
CREATE DATABASE IF NOT EXISTS `artista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `artista`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_addListingPicture` (IN `in_listing` INT, IN `in_path` VARCHAR(255))  BEGIN
    
	SET @numRows = (SELECT COUNT(*)  FROM `listing_picture` WHERE `listing_id` = in_listing);
    
    SET @seller_id = (SELECT seller FROM `listing` WHERE `id` = in_listing);
    
    INSERT INTO `picture`(`seller`,`isProfile`,`path`) VALUES (@seller_id,0,in_path);
    
    SET @last_insert = (LAST_INSERT_ID());
    
    IF @numRows = 0
    THEN UPDATE `listing` SET `mainPic` = @last_insert WHERE `id` = in_listing;
    END IF;
    
    INSERT INTO `listing_picture`(`listing_id`,`picture_id`) VALUES (in_listing, @last_insert);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_addPortfolioPicture` (IN `in_seller` INT, IN `in_path` VARCHAR(255))  BEGIN    
    
	SET @portfolio_id = (SELECT `id` FROM `portfolio` WHERE `seller`=in_seller);
	

	INSERT INTO `picture`(`seller`,`isProfile`,`path`) VALUES (in_seller,0,in_path);
    
    SET @last_ins = (LAST_INSERT_ID());
    
    INSERT INTO `portfolio_picture`(`portfolio_id`,`picture_id`) VALUES (@portfolio_id, @last_ins);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_addProfilePicture` (IN `in_seller` INT, IN `in_path` VARCHAR(255))  BEGIN

	INSERT INTO `picture`(`seller`,`isProfile`,`path`) VALUES (in_seller,1,in_path);
    
    SET @last_ins = (LAST_INSERT_ID());
    
	UPDATE `picture`
    SET `isProfile` = 0 
    WHERE `seller` = in_seller AND `id` != @last_ins;    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Statue'),
(2, 'Painting'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shown` tinyint(4) NOT NULL,
  `category` int(11) NOT NULL,
  `mainPic` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `seller`, `price`, `description`, `timestamp`, `shown`, `category`, `mainPic`, `name`) VALUES
(1, 1, 199.98, 'Cheap!', '2018-01-14 17:51:02', 1, 1, 3, 'Statue of David'),
(2, 1, 3.5, 'Brand new!', '2018-01-14 17:51:03', 1, 2, 5, 'Mona Lisa'),
(3, 2, 200000, 'Stolen', '2018-01-14 17:51:04', 1, 2, 7, 'Lucian Freud\'s Francis Bacon'),
(5, 1, 10, 'Sadez', '2018-01-14 19:34:53', 1, 1, 9, 'Od antona rumen sadez'),
(7, 9, 123, '123', '2018-01-14 19:44:41', 1, 1, 10, 'Joze'),
(8, 14, 420, 'Hardcore', '2018-01-14 21:40:16', 1, 3, 25, 'Mona Lisa Dab'),
(9, 4, 4000, 'pod 4keke ne grem', '2018-01-14 21:43:05', 1, 1, 26, 'Modern art'),
(10, 1, 432, 'fgs', '2018-01-14 21:51:12', 1, 1, 27, 'gfsd'),
(13, 1, 123, '123', '2018-01-14 22:23:37', 1, 1, 28, 'test123'),
(14, 1, 123, '123', '2018-01-14 22:30:26', 1, 2, 29, 'mona'),
(15, 1, 123, '123', '2018-01-14 22:30:53', 1, 2, 30, 'mona'),
(16, 4, 44123, '41231', '2018-01-14 22:33:11', 1, 1, 31, '3421'),
(18, 4, 150, 'Lepa slika', '2018-01-14 22:35:36', 1, 3, 32, 'testni izdelek'),
(20, 9, 125, 'Mozen popust', '2018-01-14 22:44:02', 1, 1, 33, 'Umetnina'),
(21, 4, 1230, 'Lepa', '2018-01-17 22:35:15', 1, 2, 34, 'Izdelek1'),
(22, 4, 500, 'Dobra slika', '2018-01-17 23:52:11', 1, 1, 35, 'TestniIzdelek123');

-- --------------------------------------------------------

--
-- Table structure for table `listing_picture`
--

CREATE TABLE `listing_picture` (
  `listing_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listing_picture`
--

INSERT INTO `listing_picture` (`listing_id`, `picture_id`) VALUES
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(5, 9),
(7, 10),
(8, 25),
(9, 26),
(10, 27),
(13, 28),
(14, 29),
(15, 30),
(16, 31),
(18, 32),
(20, 33),
(21, 34),
(22, 35);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `isProfile` tinyint(4) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `seller`, `isProfile`, `path`) VALUES
(1, 1, 0, '..\\..\\public\\pictures\\test1.png'),
(2, 1, 1, '..\\..\\public\\pictures\\test1.png'),
(3, 1, 0, '..\\..\\public\\pictures\\listing1_1.png'),
(4, 1, 0, '..\\..\\public\\pictures\\listing1_2.png'),
(5, 1, 0, '..\\..\\public\\pictures\\listing2_1.png'),
(6, 1, 0, '..\\..\\public\\pictures\\listing2_2.png'),
(7, 2, 0, '..\\..\\public\\pictures\\listing3_1.png'),
(8, 1, 0, '..\\..\\public\\pictures\\test1.png'),
(9, 1, 0, '..\\public\\pictures\\1515954893.png'),
(10, 9, 0, '..\\public\\pictures\\1515955481.png'),
(11, 4, 0, '..\\public\\pictures\\profile1515957984.png'),
(12, 4, 0, '..\\public\\pictures\\profile1515958076.png'),
(13, 4, 0, '..\\public\\pictures\\profile1515958224.png'),
(14, 4, 0, '..\\public\\pictures\\profile1515958284.png'),
(15, 4, 0, '..\\public\\pictures\\profile1515958363.png'),
(16, 4, 0, '..\\public\\pictures\\profile1515958387.png'),
(17, 4, 0, '..\\public\\pictures\\profile1515958536.png'),
(18, 4, 1, '..\\public\\pictures\\profile1515958722.png'),
(19, 11, 1, '/phpst/assets/pictures/uporabnik.PNG'),
(20, 12, 1, '../phpst/assets/pictures/uporabnik.PNG'),
(21, 13, 1, '.\\assets\\pictures\\uporabnik.PNG'),
(22, 9, 1, '..\\public\\pictures\\profile1515962248.png'),
(23, 14, 0, '.\\assets\\pictures\\uporabnik.PNG'),
(24, 14, 1, '..\\public\\pictures\\profile1515962349.png'),
(25, 14, 0, '..\\public\\pictures\\1515962415.png'),
(26, 4, 0, '..\\public\\pictures\\1515962585.png'),
(27, 1, 0, '..\\public\\pictures\\1515963072.png'),
(28, 1, 0, '..\\public\\pictures\\1515965017.png'),
(29, 1, 0, '..\\public\\pictures\\1515965426.png'),
(30, 1, 0, '..\\public\\pictures\\1515965453.png'),
(31, 4, 0, '..\\public\\pictures\\1515965591.png'),
(32, 4, 0, '..\\public\\pictures\\1515965736.png'),
(33, 9, 0, '..\\public\\pictures\\1515966242.png'),
(34, 4, 0, '..\\public\\pictures\\1516224915.png'),
(35, 4, 0, '..\\public\\pictures\\1516229531.png');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `seller`, `description`) VALUES
(1, 1, '123321'),
(2, 2, 'I am a decent artist, currently taking orders'),
(3, 3, NULL),
(4, 4, '123'),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, 'Umetniska dusa'),
(9, 9, 'Gorenc '),
(10, 10, NULL),
(11, 11, NULL),
(12, 12, NULL),
(13, 13, NULL),
(14, 14, '123');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_picture`
--

CREATE TABLE `portfolio_picture` (
  `portfolio_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_picture`
--

INSERT INTO `portfolio_picture` (`portfolio_id`, `picture_id`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `user`, `rating`) VALUES
(1, 6, 0),
(2, 7, 0),
(3, 11, 0),
(4, 1, 0),
(5, 12, 0),
(6, 13, 0),
(7, 14, 0),
(8, 15, 0),
(9, 16, 0),
(10, 17, 0),
(11, 18, 0),
(12, 19, 0),
(13, 20, 0),
(14, 21, 0);

--
-- Triggers `seller`
--
DELIMITER $$
CREATE TRIGGER `seller_AFTER_INSERT` AFTER INSERT ON `seller` FOR EACH ROW BEGIN
	UPDATE `artista`.`user` SET `type` = 1 WHERE `id`= NEW.user;
    INSERT INTO `artista`.`portfolio` (`seller`) VALUES (NEW.id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwdhash` varchar(45) NOT NULL,
  `regTimestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pwdhash`, `regTimestamp`, `type`) VALUES
(1, 'a b', 'anton.banana@mail.com', '0000', '2018-01-14 17:51:01', 1),
(2, 'Benjamin Hruška', 'ben.hr@mail.com', '0000', '2018-01-14 17:51:01', 0),
(3, 'Cene Jabuk', 'cene.ja@mail.com', '0000', '2018-01-14 17:51:01', 0),
(4, 'David Mandarina', 'david.ma@mail.com', '0000', '2018-01-14 17:51:01', 0),
(5, 'Edvard Grozd', 'edvard.grozd@mail.com', '0000', '2018-01-14 17:51:01', 0),
(6, 'Fony Bony', 'fony.bony@mail.com', '0000', '2018-01-14 17:51:01', 1),
(7, 'German Gui', 'german.gui@mail.com', '0000', '2018-01-14 17:51:01', 1),
(8, 'Herman Pomaranča', 'her.pom@mail.com', '0000', '2018-01-14 17:51:01', 0),
(9, 'Ian Koruza', 'pwner1339@mail.com', '0000', '2018-01-14 17:51:01', 0),
(10, 'Jaka Kaka', 'jaka.k@mail.com', '0000', '2018-01-14 17:51:01', 0),
(11, 'Testni Uporabnik', 'test@test.com', '123', '2018-01-14 17:51:42', 1),
(12, 'Janez Novak', 'janez@novak.si', '123', '2018-01-14 17:56:15', 1),
(13, 'Janez Od nevemkerga', 'janez@si', '123', '2018-01-14 18:03:38', 1),
(14, 'Ustvari Racun', 'ustvari@rac', '123', '2018-01-14 18:05:16', 1),
(15, 'Joze Poklukar', 'joze@poklukar.si', '123', '2018-01-14 18:15:08', 1),
(16, 'Joze Andrej', 'joze@andrej.si', '123', '2018-01-14 19:35:40', 1),
(17, 'Jozef Jozef', 'jozef@', '123', '2018-01-14 21:12:25', 1),
(18, 'Luka Miha', 'miha@', '123', '2018-01-14 21:24:01', 1),
(19, 'Na Ba', 'naba@', '123', '2018-01-14 21:30:13', 1),
(20, 'r r', 'r@', '123', '2018-01-14 21:31:12', 1),
(21, 'Miha Mihelcic', 'igor.tomaz.peternel@gmail.com', '123', '2018-01-14 21:38:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`seller`),
  ADD KEY `id_idx1` (`category`),
  ADD KEY `idPicture_idx` (`mainPic`);

--
-- Indexes for table `listing_picture`
--
ALTER TABLE `listing_picture`
  ADD PRIMARY KEY (`listing_id`,`picture_id`),
  ADD KEY `fk_listing_has_picture_picture1_idx` (`picture_id`),
  ADD KEY `fk_listing_has_picture_listing1_idx` (`listing_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_picture_seller_idx` (`seller`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`seller`);

--
-- Indexes for table `portfolio_picture`
--
ALTER TABLE `portfolio_picture`
  ADD PRIMARY KEY (`portfolio_id`,`picture_id`),
  ADD KEY `fk_portfolio_has_picture_picture1_idx` (`picture_id`),
  ADD KEY `fk_portfolio_has_picture_portfolio1_idx` (`portfolio_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `fk_listing_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listing_picture` FOREIGN KEY (`mainPic`) REFERENCES `picture` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listing_seller` FOREIGN KEY (`seller`) REFERENCES `seller` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `listing_picture`
--
ALTER TABLE `listing_picture`
  ADD CONSTRAINT `fk_listing_picture_listing1` FOREIGN KEY (`listing_id`) REFERENCES `listing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_listing_picture_picture1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_picture_seller` FOREIGN KEY (`seller`) REFERENCES `seller` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_seller` FOREIGN KEY (`seller`) REFERENCES `seller` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `portfolio_picture`
--
ALTER TABLE `portfolio_picture`
  ADD CONSTRAINT `fk_portfolio_picture_picture1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_portfolio_picture_portfolio1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `fk_seller_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
