-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Generation Time: Jan 21, 2021 at 11:58 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datacenter`
--

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`hos_code`, `name`, `service_plan`, `province`, `url`, `created_at`, `updated_at`) VALUES
('10717', 'รพ.พะเยา', 'S', 'พะเยา', '', NULL, NULL),
('10718', 'รพ.เชียงคำ', 'M1', 'พะเยา', '', NULL, NULL),
('11120', 'รพ.เทพรัตนเวชชานุกูลเฉลิมพระเกียรติ ๖๐ พรรษา', 'F2', 'เชียงใหม่', '', NULL, NULL),
('11123', 'รพ.แม่แตง', 'F2', 'เชียงใหม่', '', NULL, NULL),
('11127', 'รพ.พร้าว', 'F2', 'เชียงใหม่', '', NULL, NULL),
('11132', 'รพ.ฮอด', 'F2', 'เชียงใหม่', '', NULL, NULL),
('11133', 'รพ.ดอยเต่า', 'F2', 'เชียงใหม่', '', NULL, NULL),
('11143', 'รพ.ทุ่งหัวช้าง', 'F2', 'ลำพูน', '', NULL, NULL),
('11147', 'รพ.เกาะคา', 'M2', 'ลำปาง', '', NULL, NULL),
('11148', 'รพ.เสริมงาม', 'F2', 'ลำปาง', '', NULL, NULL),
('11156', 'รพ.ห้างฉัตร', 'F2', 'ลำปาง', '', NULL, NULL),
('11169', 'รพ.สูงเม่น', 'F2', 'แพร่', '', NULL, NULL),
('11172', 'รพ.หนองม่วงไข่', 'F2', 'แพร่', '', NULL, NULL),
('11184', 'รพ.จุน', 'F2', 'พะเยา', '', NULL, NULL),
('11185', 'รพ.เชียงม่วน', 'F2', 'พะเยา', '', NULL, NULL),
('11186', 'รพ.ดอกคำใต้', 'F2', 'พะเยา', '', NULL, NULL),
('11187', 'รพ.ปง', 'F2', 'พะเยา', '', NULL, NULL),
('11188', 'รพ.แม่ใจ', 'F2', 'พะเยา', '', NULL, NULL),
('11189', 'รพ.เทิง', 'M2', 'เชียงราย', '', NULL, NULL),
('11190', 'รพ.พาน', 'F1', 'เชียงราย', '', NULL, NULL),
('11191', 'รพ.ป่าแดด', 'F2', 'เชียงราย', '', NULL, NULL),
('11192', 'รพ.แม่จัน', 'M2', 'เชียงราย', '', NULL, NULL),
('11193', 'รพ.เชียงแสน', 'F2', 'เชียงราย', '', NULL, NULL),
('11194', 'รพ.แม่สาย', 'M2', 'เชียงราย', '', NULL, NULL),
('11196', 'รพ.เวียงป่าเป้า', 'F1', 'เชียงราย', '', NULL, NULL),
('11205', 'รพ.แม่สะเรียง', 'M2', 'แม่ฮ่องสอน', '', NULL, NULL),
('11454', 'รพ.สมเด็จพระยุพราชเชียงของ', '', 'เชียงราย', '', NULL, NULL),
('28823', 'รพ.ดอยหลวง', 'F3', 'เชียงราย', '', NULL, NULL),
('40744', 'รพ.ภูซาง', 'F3', 'พะเยา', '', NULL, NULL),
('40745', 'รพ.ภูกามยาว', 'F3', 'พะเยา', '', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
