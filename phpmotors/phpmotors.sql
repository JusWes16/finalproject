-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 09:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(1, 'Admin', 'User', 'admin@cse340.net', '$2y$10$WfIB7bVGhmgwkqbARB8/lO3p27cRNNjbuDogvzKbWwTrdXJy2KMw2', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(9, 1, 'wrangler.jpg', '/phpmotors/images/vehicles/wrangler.jpg', '2021-03-19 20:43:15', 1),
(10, 1, 'wrangler-tn.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '2021-03-19 20:43:15', 1),
(11, 2, 'model-t.jpg', '/phpmotors/images/vehicles/model-t.jpg', '2021-03-19 20:43:34', 1),
(12, 2, 'model-t-tn.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '2021-03-19 20:43:34', 1),
(13, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2021-03-19 20:43:48', 1),
(14, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2021-03-19 20:43:48', 1),
(15, 4, 'monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck.jpg', '2021-03-19 20:44:08', 1),
(16, 4, 'monster-truck-tn.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '2021-03-19 20:44:08', 1),
(17, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2021-03-19 20:44:20', 1),
(18, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2021-03-19 20:44:20', 1),
(19, 6, 'batmobile.jpg', '/phpmotors/images/vehicles/batmobile.jpg', '2021-03-19 20:44:46', 1),
(20, 6, 'batmobile-tn.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '2021-03-19 20:44:46', 1),
(21, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2021-03-19 20:45:00', 1),
(22, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2021-03-19 20:45:00', 1),
(23, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2021-03-19 20:45:12', 1),
(24, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-03-19 20:45:12', 1),
(25, 9, 'crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic.jpg', '2021-03-19 20:45:21', 1),
(26, 9, 'crwn-vic-tn.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '2021-03-19 20:45:21', 1),
(27, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2021-03-19 20:45:32', 1),
(28, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2021-03-19 20:45:32', 1),
(29, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2021-03-19 20:45:44', 1),
(30, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2021-03-19 20:45:45', 1),
(31, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2021-03-19 20:45:52', 1),
(32, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2021-03-19 20:45:52', 1),
(33, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2021-03-19 20:46:01', 1),
(34, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-03-19 20:46:01', 1),
(35, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2021-03-19 20:46:11', 1),
(36, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2021-03-19 20:46:11', 1),
(37, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2021-03-19 20:46:23', 1),
(38, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2021-03-19 20:46:23', 1),
(39, 16, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2021-03-19 21:20:31', 1),
(40, 16, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2021-03-19 21:20:31', 1),
(41, 3, 'aventador-doors.jpg', '/phpmotors/images/vehicles/aventador-doors.jpg', '2021-03-19 21:26:17', 0),
(42, 3, 'aventador-doors-tn.jpg', '/phpmotors/images/vehicles/aventador-doors-tn.jpg', '2021-03-19 21:26:17', 0),
(43, 1, 'wrangler-outside.jpg', '/phpmotors/images/vehicles/wrangler-outside.jpg', '2021-03-19 21:26:41', 0),
(44, 1, 'wrangler-outside-tn.jpg', '/phpmotors/images/vehicles/wrangler-outside-tn.jpg', '2021-03-19 21:26:41', 0),
(45, 10, 'camaro-outside.jpg', '/phpmotors/images/vehicles/camaro-outside.jpg', '2021-03-19 21:26:58', 0),
(46, 10, 'camaro-outside-tn.jpg', '/phpmotors/images/vehicles/camaro-outside-tn.jpg', '2021-03-19 21:26:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text DEFAULT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,2) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!', '/images/jeep-wrangler.jpg', '/images/jeep-wrangler-tn.jpg', '28045.00', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it\'s black.', '/images/ford-modelt.jpg', '/images/ford-modelt-tn.jpg', '30000.00', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/images/lambo-Adve.jpg', '/images/lambo-Adve-tn.jpg', '417650.00', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/images/monster.jpg', '/images/monster-tn.jpg', '150000.00', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/images/ms.jpg', '/images/ms-tn.jpg', '100.00', 200, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '/images/bat.jpg', '/images/bat-tn.jpg', '65000.00', 2, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/images/mm.jpg', '/images/mm-tn.jpg', '10000.00', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/images/fire-truck.jpg', '/images/fire-truck-tn.jpg', '50000.00', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/images/crown-vic.jpg', '/images/crown-vic-tn.jpg', '10000.00', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/images/camaro.jpg', '/images/camaro-tn.jpg', '25000.00', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/images/escalade.jpg', '/images/escalade-tn.jpg', '75195.00', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/images/hummer.jpg', '/images/hummer-tn.jpg', '58800.00', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/images/aerocar.jpg', '/images/aerocar-tn.jpg', '1000000.00', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You\'ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/images/fbi.jpg', '/images/fbi-tn.jpg', '20000.00', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '/images/dog.jpg', '/images/dog-tn.jpg', '35000.00', 1, 'Brown', 2),
(16, 'DMC', 'DeLorean', 'This car will make you feel like you are traveling through time. One of a kind.', '/phpmotors/images/no-image.png', '/phpmotors/images/no-image.png', '50000.00', 1, 'Silver', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) UNSIGNED NOT NULL,
  `clientFirstname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `clientLastname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `clientReview` varchar(200) CHARACTER SET latin1 NOT NULL,
  `clientRating` int(1) NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `clientFirstname`, `clientLastname`, `clientReview`, `clientRating`, `invId`) VALUES
(5, 'Wes', 'Know', 'Fastest car in the west!', 5, 3),
(6, 'Weston ', 'Knowlton', 'Great car. I feel like batman.', 4, 6),
(7, 'Weston ', 'Knowlton', 'I can go anywhere!!!', 4, 1),
(8, 'Weston ', 'Knowlton', 'Best truck ever.', 3, 4),
(15, 'Christian', 'User', 'Love this car!', 5, 3),
(16, 'Admin', 'User', 'Good car!', 3, 1),
(17, 'Admin', 'User', 'As fast as a rocket! Love this car.', 4, 10),
(18, 'Jake', 'Statefarm', 'Love this truck! And I can drive around with confidence knowing it&#39;s covered!', 3, 8),
(19, 'Parry', 'the Platypus', 'Goodcar that runs great. Funny how everyone slows down when they see me coming. Weird. ', 3, 9),
(20, 'Anonymous', 'User', 'Really nice car! Talk about luxury. ', 5, 11),
(21, 'Tom', 'Jerry', 'I like the car but I have pretty much doubled the price of the cart in speeding tickets... wish someone told me about that before I bought it...', 2, 3),
(22, 'Bat', 'Man', 'It&#39;s cool but not as cool as my car... go buy my car instead, it has gadgets. ', 1, 3),
(23, 'Admin', 'User', 'This car is great!', 4, 3),
(24, 'Admin', 'User', 'Great car!', 4, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_inv_reviews` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
