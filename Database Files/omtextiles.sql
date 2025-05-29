-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 09:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omtextiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `p_img` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `product_keywords` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_description`, `price`, `quantity`, `p_img`, `date_added`, `product_keywords`, `category`) VALUES
(1, 'Polyester Kurti Dupatta <br> design 1', '<p>This is design 1 of the polyester kurti and dupatta set. This product is sold in sets of kurti and dupatta.</p>', 450, 30, 'Polyester kurti dupatta_1.jpg', '2023-08-09', 'Polyester, Kurti Dupatta, Kurti, Dupatta\nPolyester Kurti Dupatta, Polyester Kurti', 'Dupatta and kurti set, Polyester jacquard'),
(2, 'Polyester Sarees <br> design 1', '<p>This is design 1 of polyester saree.</p>', 650, 30, 'Polyester Sarees_1.jpg', '2023-08-09', 'Polyester Sarees, Polyester, Sarees', 'Polyester jacquard, Sarees'),
(3, 'Viscose kurti dupatta <br> design 1', '<p>This is design 1 of the Viscose kurti dupatta set. This product is sold in sets of kurti and dupatta.</p>', 1050, 30, 'Viscose kurti dupatta_1.jpg', '2023-08-09', 'Viscose kurti dupatta, Viscose, kurti, dupatta, kurti dupatta, Viscose kurti', 'Dupatta and kurti set, Viscose jacquard'),
(4, 'Viscose Lehenga fabrics <br> design 1', '<p>This is design 1 of Viscose Lehenga fabrics_2. The Viscose Lehenga fabric is sold in meters as per the client\'s requirement.</p>', 350, 600, 'Viscose Lehenga fabrics_1.jpg', '2023-08-09', 'Viscose Lehenga fabrics, Viscose, Lehenga fabrics, fabrics', 'Viscose jacquard, Lehenga fabric'),
(5, 'Viscose Sarees <br> design 1', '<p>This is design 1 of Viscose Sarees.</p>', 1300, 30, 'Viscose Sarees_1.jpg', '2023-08-09', 'Viscose Sarees, Viscose, Sarees', 'Viscose jacquard, Sarees'),
(6, 'Polyester Kurti Dupatta <br> design 2', '<p>This is design 2 of the polyester kurti and dupatta set. This product is sold in sets of kurti and dupatta.</p>', 475, 3, 'Polyester kurti dupatta_2.jpg', '2023-08-10', 'Polyester, Kurti Dupatta, Kurti, Dupatta\r\nPolyester Kurti Dupatta, Polyester Kurti', 'Dupatta and kurti set, Polyester jacquard'),
(7, 'Polyester Sarees <br> design 2', '<p>This is design 2 of polyester saree.</p>', 550, 30, 'Polyester Sarees_2.jpg', '2023-08-10', 'Polyester Sarees, Polyester, Sarees', 'Polyester jacquard, Sarees'),
(8, 'Viscose kurti dupatta <br> design 2', '<p>This is design 2 of the Viscose kurti dupatta set. This product is sold in sets of kurti and dupatta.</p>', 1000, 30, 'Viscose kurti dupatta_2.jpg', '2023-08-10', 'Viscose kurti dupatta, Viscose, kurti, dupatta, kurti dupatta, Viscose kurti', 'Dupatta and kurti set, Viscose jacquard'),
(9, 'Viscose Lehenga fabrics <br> design 2', '<p>This is design 2 of Viscose Lehenga fabrics_2. The Viscose Lehenga fabric is sold in meters as per the clients requirement.</p>', 350, 600, 'Viscose Lehenga fabrics_2.jpg', '2023-08-10', 'Viscose Lehenga fabrics, Viscose, Lehenga fabrics, fabrics', 'Viscose jacquard, Lehenga fabric'),
(10, 'Viscose Sarees <br> design 2', '<p>This is design 2 of Viscose Sarees.</p>', 1400, 30, 'Viscose Sarees_2.jpg', '2023-08-10', 'Viscose Sarees, Viscose, Sarees', 'Viscose jacquard, Sarees');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shippingaddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
