-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 02:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image_url`, `description`, `keywords`) VALUES
(1, 'Reverse Osmosis Filter Ecosoft Standard 6-50 with Mineralization', 'Images\\Products\\reverse_osmosis_filter_ecosoft_standard_6-50_with_mineralization.png', 'Six-stage water purification system with integrated mineralization. Produces 7.9L (2.1 gal) of drinking water per hour using an Ecosoft membrane. Delivers fresh-tasting water via a mineralization filter. Food-grade plastic housing made in the EU.', 'reverse osmosis, water filter, purification, mineralization, drinking water'),
(2, 'Reverse Osmosis Filter Ecosoft Standard 5-50P with Pump', 'Images\\Products\\reverse_osmosis_filter_ecosoft_standard_5-50P_with_pump.png', 'Five-stage filtration system with a built-in pump for low-pressure water systems. Produces 7.9L (2.1 gal) of drinking water per hour. Uses an Ecosoft membrane. Food-grade plastic housing made in the EU.', 'reverse osmosis, water filter, purification, drinking water, filtration'),
(3, 'Mo675Mpurebal Filtration System Ro Pure Balance Mine', 'Images/Products\\Mo675mpurebal Sistem Filtrim Ro Pure Balance Mine.png', 'Advanced reverse osmosis system combining modern technology and natural processes. Delivers clean, delicious water with stable mineral content, enriched with calcium and magnesium. Reduces PFAS by 99%.', 'reverse osmosis, water filter, filtration, mineralization, drinking water'),
(4, 'PURE Alkafuse Revers Osmosis Filter', 'Images\\Products\\PURE_Alkafuse_reverse_osmosis_filter.png', 'Ecosoft PURE reverse osmosis system that combines advanced technology with natural processes. Provides highly alkaline water (pH > 8.5) with stable mineral content. Reduces PFAS by up to 99%.', 'reverse osmosis, water filter, filtration, mineralization, drinking water'),
(5, 'Reverse Osmosis Filter Ecosoft PURE AquaCalcium', 'Images\\Products\\reverse_osmosis_filter_ecosoft_pure_aquacalcium.png', 'Produces calcium-enriched water using the AquaCalcium mineralization filter. Mimics natural mountain rock percolation. Delivers purified water with 55–60 mg/L of stable mineral content.', 'reverse osmosis, water filter, mineralization, purification, drinking water'),
(6, 'Hidrotek Royal Cloud H04 Reverse Osmosis Water Dispenser, 4 Stage Soda Maker', 'Images/Products\\Royal cloud HO4.png', 'Four-stage reverse osmosis dispenser with integrated soda maker. Connect a CO2 cylinder for instant sparkling water. Provides hot, cold, or ambient purified water. Removes nearly all viruses, bacteria, and contaminants affecting water taste, color, and smell.', 'reverse osmosis, water filter, purification, filtration, drinking water'),
(7, 'RObust 1000 Reverse Osmosis Filter', 'Images\\Products\\7_robust_1000_reverse_osmosis_filter.png', 'Direct-flow reverse osmosis system with standard size, ideal for cafés, gas stations, offices, schools, and stores. Provides high-performance water filtration.', 'reverse osmosis, water filter, filtration, drinking water'),
(8, 'System Robust Pro', 'Images/Products\\0.png', 'Commercial water filter system designed for integration with coffee machines, ice makers, and taps in cafés and restaurants. Provides clean, filtered water for both consumption and equipment use.', 'water filter, filtration, drinking water'),
(9, 'Pitcher Ecosoft Nemo', 'Images\\Products\\9_pitcher_ecosoft_nemo.png', 'Portable water pitcher with a total capacity of 3L and purified water capacity of 1.8L. Available in blue, red, and green colors.', 'water filter, purification, drinking water'),
(10, 'Ecosoft PURE Water Softener 12L', 'Images/Products\\Ecosoft PURE water softner 12L.png', 'Whole-house water softener with 12L ECOLITE media. Reduces hardness in household water using a cylinder module with control valve and a brine tank. Delivers softened water via ion exchange technology.', 'softener, purification, drinking water'),
(11, 'Ecosoft PURE Water Softener 18L', 'Images/Products\\Ecosoft PURE water softner 12L.png', 'Whole-house water softener with 18L ECOLITE media. Reduces hardness in household water using a cylinder module with control valve and a brine tank. Delivers softened water via ion exchange technology.', 'softener, purification, drinking water'),
(12, 'Ecosoft PURE Water Softener 25L', 'Images/Products\\Ecosoft PURE water softner 12L.png', 'Whole-house water softener with 25L ECOLITE media. Reduces hardness in household water using a cylinder module with control valve and a brine tank. Delivers softened water via ion exchange technology.', 'softener, purification, drinking water'),
(13, 'Compact Filter to Remove Iron & Hardens Ecosoft FK1035', 'Images/Products\\Compact filter to remove iron and hardnes Ecosoft FK1035.png', 'Whole-house water filter with ECOMIX A technology. Produces iron-free, soft water with a slight blue tint. Reduces iron, hardness, manganese, ammonium, and organic matter.', 'water filter, softener, filtration, purification'),
(14, 'Ecosoft Absolute Advanced Water Softener FK0835', 'Images/Products\\Ecosoft Absolute advanced water softener FK0835.png', 'Advanced whole-house softener using ECOMIX A technology. Delivers crystal-clear, iron-free, and soft water. Reduces iron, hardness, manganese, ammonium, and organic matter.', 'softener, water filter, purification, filtration'),
(15, 'Ecosoft Sediment Filter Housing: 3/4\" High Pressure', 'Images\\Products\\ecosoft sediment filter housing ecosoft 34  high pressure.png', 'Includes housing, polypropylene cartridge, bracket, service wrench, and screws. 3/4\" connection size. Operates at +3°C to +43°C and up to 30 bar pressure.', 'sediment filter, filtration, water filter'),
(16, 'Housing Ecosoft BB10 1\"', 'Images/Products\\housing ecosoft BB10 1.png', 'Filter housing with bracket, wrench, screws. 1\" connection. Designed for pressures up to 8 bar.', 'filtration, water filter'),
(17, 'Housing Ecosoft BB20 1\"', 'Images/Products\\housing ecosoft BB20 1.png', 'Filter housing with bracket, wrench, screws. 1\" connection. Designed for pressures up to 8 bar.', 'filtration, water filter'),
(18, 'Polypropylene Cartridge Ecosoft 2,5\"x10\" .1/.5/.10/.20 mkm', 'Images/Products\\img22.png', 'Sediment filter for sand, silt, and rust. Available in 1, 5, 10, and 20 micron versions. Lifetime: up to 10,000 liters each.', 'sediment filter, filtration'),
(19, 'Polypropylene Cartridge Ecosoft 4,5\"x10\" .5/.20 mkm', 'Images/Products\\img22.png', 'High-capacity sediment filter for sand, silt, and rust. Available in 5 and 20 micron versions. Lifetime: up to 80,000 liters.', 'sediment filter, filtration'),
(20, 'Dual Gradient Polypropylene Cartridge Ecosoft 4,5\"x20\"', 'Images\\Products\\20_dual_gradient_polypropylene_cartridge_ecosoft_4_5_x20.png', 'Offers triple the capacity and contaminant rejection compared to standard polypropylene filters. Maintains low pressure drop and stable performance even with varying water turbidity. High-quality construction provides efficient filtration while saving space and cost.', 'sediment filter, filtration'),
(21, 'Stringwound Cartridge Ecosoft 2,5\"x10\" .1/.5/.10/.20 mkm', 'Images/Products\\stringwound cartridge .png', 'String-wound sediment filter for sand, silt, and rust. Available in 1, 5, 10, and 20 micron options. Lifetime: up to 15,000 liters each.', 'sediment filter, filtration'),
(22, 'Granulated Activated Carbon Replacement Filter 2,5x10\"', 'Images/Products\\img1.png', 'Reduces chlorine, chlorination byproducts, and phenols. Improves water color, taste, and odor. Capacity: up to 10,000 liters.', 'carbon filter, filtration, chlorine removal'),
(23, 'Granulated Activated Carbon Replacement Filter 4,5x10\"', 'Images/Products\\img1.png', 'Reduces chlorine, chlorination byproducts, and phenols. Improves water color, taste, and odor. Capacity: up to 30,000 liters.', 'carbon filter, filtration, chlorine removal'),
(24, 'Granulated Activated Carbon Replacement Filter 4,5x20\"', 'Images/Products\\img1.png', 'Reduces chlorine, chlorination byproducts, and phenols. Improves water color, taste, and odor. Capacity: up to 60,000 liters.', 'carbon filter, filtration, chlorine removal'),
(25, 'Carbon Block Replacement Filter', 'Images/Products\\img1.png', '2.5x10\" carbon block filter. Reduces chlorine, chlorination byproducts, and phenols. Improves taste, odor, and color. Capacity: up to 10,000 liters.', 'carbon filter, filtration, chlorine removal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
