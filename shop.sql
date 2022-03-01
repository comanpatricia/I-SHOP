-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: iun. 26, 2021 la 10:55 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `shop`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(150) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Patricia', 'admin', 'admin@gmail.com', '8c11d5879f52b755e0d91038e550ef50', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_area`
--

DROP TABLE IF EXISTS `tbl_area`;
CREATE TABLE IF NOT EXISTS `tbl_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(100) NOT NULL,
  `city` varchar(11) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_name`, `city`) VALUES
(1, 'Bistrita', '1'),
(2, 'Beclean', '1'),
(3, 'Nasaud', '1'),
(4, 'Sangeorz-Bai', '1'),
(5, 'Cluj-Napoca', '2'),
(6, 'Campia-Turzii', '2'),
(7, 'Dej', '2'),
(8, 'Gherla', '2'),
(9, 'Huedin', '2'),
(10, 'Turda', '2'),
(11, 'Suceava', '3'),
(12, 'Falticeni', '3'),
(13, 'Radauti', '3'),
(14, 'Campulung Moldovenesc', '3'),
(15, 'Vatra Dornei', '3'),
(16, 'Targu-Mures', '4'),
(17, 'Reghin', '4'),
(18, 'Sighisoara', '4'),
(19, 'Sovata', '4'),
(20, 'Tarnaveni', '4'),
(21, 'Ludus', '4'),
(22, 'Zalau', '5'),
(23, 'Jibou', '5'),
(24, 'Cehu Silvaniei', '5'),
(25, 'Simleu Silvaniei', '5');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, ' Zara'),
(2, ' Bershka'),
(3, ' Stradivarius'),
(4, 'Pull&Bear'),
(5, 'H&M'),
(7, ' Adidas');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Shirt'),
(2, ' Dress'),
(3, 'Skirt');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_city`
--

DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`) VALUES
(1, 'Bistrita-Nasaud'),
(2, 'Cluj-Napoca'),
(3, 'Suceava'),
(4, 'Mures'),
(5, 'Salaj');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_address` text NOT NULL,
  `c_city` varchar(30) NOT NULL,
  `c_area` varchar(30) NOT NULL,
  `c_zip` varchar(30) NOT NULL,
  `c_phone` varchar(30) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pass` varchar(32) NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_email` (`c_email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`c_id`, `c_name`, `c_address`, `c_city`, `c_area`, `c_zip`, `c_phone`, `c_email`, `c_pass`, `c_status`) VALUES
(4, 'Coman Patricia', 'Bistrita', '1', '1', '450025', '0753479397', 'coman@gmail.com', '823fec7a2632ea7b498c1d0d11c11377', 1),
(7, 'Andreea', 'Cluj', '1', 'Select Area', '456789', '23456789045', 'andreea@gmail.com', '6c48441b0d58474e829857663a937488', 0),
(13, 'admin', 'Bistrita', '1', '1', '420025', '0753479397', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(21, 4, 13, 'Orange dress', 8, 800.00, 'uploads/dc92482ccb.jpg', '2021-06-24 23:40:33', 1),
(22, 4, 12, 'Black dress', 1, 60.00, 'uploads/22418bbc0b.jpg', '2021-06-25 12:36:35', 2),
(24, 4, 9, 'White dress', 1, 40.00, 'uploads/a4337c5eee.jpg', '2021-06-26 01:16:22', 0),
(25, 4, 12, 'Black dress', 1, 60.00, 'uploads/22418bbc0b.jpg', '2021-06-26 21:33:01', 0),
(26, 13, 10, 'Green skirt', 1, 25.00, 'uploads/3d07e834ec.jpg', '2021-06-26 22:45:10', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gif` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `sales` int(1) NOT NULL,
  `size` varchar(6) NOT NULL,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `gif`, `image2`, `keywords`, `type`, `sales`, `size`, `color`) VALUES
(1, 'White top', 1, 5, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 30.00, 'uploads/557008c80f.jpg', 'vv1.gif', 'prodd1.jpg', 'white top', 0, 1, 'XS', 'white'),
(2, 'Red dress', 2, 2, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 90.00, 'uploads/08eb1a3814.jpg', 'gif2.gif', 'prodd2.jpg', 'red dress', 1, 0, 'S', 'red'),
(3, 'White Shirt', 1, 5, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 40.00, 'uploads/89d8d95fc7.jpg', 'gif3.gif', 'prodd3.jpg\r\n', 'white shirt', 1, 1, 'M', 'white'),
(4, 'Mini skirt', 3, 2, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 50.00, 'uploads/8cab3cae7d.jpg', 'gif4.gif', 'prodd4.jpg', 'mini skirt black white grey', 0, 1, 'XS', 'grey'),
(8, 'Black winter dress', 2, 4, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 90.00, 'uploads/edbf65dbc7.jpg', 'gif5.gif', 'prodd5.jpg', 'black dress', 1, 0, 'XS', 'black'),
(9, 'White dress', 2, 3, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 40.00, 'uploads/a4337c5eee.jpg', 'gif6.gif', 'prodd6.jpg', 'white dress', 0, 0, 'M', 'white'),
(10, 'Green skirt', 3, 2, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 25.00, 'uploads/3d07e834ec.jpg', 'gif3.gif', 'prodd3.jpg', 'green skirt', 0, 1, 'S', 'green'),
(11, 'Black summer dress', 2, 1, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 50.00, 'uploads/29bf762236.jpg', 'gif7.gif', 'prodd7.jpg', 'black summer dress', 1, 0, 'M', 'black'),
(12, 'Black dress', 2, 4, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 60.00, 'uploads/22418bbc0b.jpg', 'gif8.gif', 'prodd8.jpg', 'Black summer dress', 0, 0, 'L', 'black'),
(13, 'Orange dress', 2, 4, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 100.00, 'uploads/dc92482ccb.jpg', 'gif9.gif', 'prodd9.jpg', 'Orange dress summer', 0, 0, 'XS', 'orange'),
(17, 'Striped dress', 2, 3, 'Material: 100% COTTON\r\nwashing: MACHINE WASH AT MAX.TEMP. 30 degrees C - MILD PROCESS\r\nbleaching: DO NOT BLEACH\r\ndrying: DO NOT TUMBLE DRY\r\nironing: IRON AT MAX. TEMP. OF 110 dregrees C WITHOUT STEAM\r\npreservation: DO NOT DRY CLEAN', 80.00, 'uploads/180548c864.jpg', 'gif10.gif', 'prodd10.jpg', 'long striped dress', 0, 1, 'XS', 'black and brown');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_wlist`
--

DROP TABLE IF EXISTS `tbl_wlist`;
CREATE TABLE IF NOT EXISTS `tbl_wlist` (
  `wlistId` int(11) NOT NULL AUTO_INCREMENT,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`wlistId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`wlistId`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(23, 4, 9, 'White dress', 40.00, 'uploads/a4337c5eee.jpg'),
(24, 4, 17, 'Striped dress', 80.00, 'uploads/180548c864.jpg'),
(25, 13, 9, 'White dress', 40.00, 'uploads/a4337c5eee.jpg'),
(26, 13, 2, 'Red dress', 90.00, 'uploads/08eb1a3814.jpg'),
(27, 4, 2, 'Red dress', 90.00, 'uploads/08eb1a3814.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

