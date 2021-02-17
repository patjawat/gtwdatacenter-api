-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Generation Time: Feb 17, 2021 at 03:31 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.14

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

INSERT INTO `branchs` (`hospcode`, `name`, `service_plan`, `province`, `url`, `created_at`, `updated_at`) VALUES
('10672', 'รพ.ลำปาง', 'A', 'ลำปาง', NULL, NULL, NULL),
('10674', 'รพ.เชียงรายประชานุเคราะห์', 'A', 'เชียงราย', NULL, NULL, NULL),
('10713', 'รพ.นครพิงค์', 'A', 'เชียงใหม่', NULL, NULL, NULL),
('10714', 'รพ.ลำพูน', 'S', 'ลำพูน', NULL, NULL, NULL),
('10715', 'รพ.แพร่', 'S', 'แพร่', NULL, NULL, NULL),
('10716', 'รพ.น่าน', 'S', 'น่าน', NULL, NULL, NULL),
('10717', 'รพ.พะเยา', 'S', 'พะเยา', NULL, NULL, NULL),
('10718', 'รพ.เชียงคำ', 'M1', 'พะเยา', NULL, NULL, NULL),
('10719', 'รพ.ศรีสังวาลย์', 'S', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11119', 'รพ.จอมทอง', 'M1', 'เชียงใหม่', NULL, NULL, NULL),
('11120', 'รพ.เทพรัตนเวชชานุกูลเฉลิมพระเกียรติ ๖๐ พรรษา', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11121', 'รพ.เชียงดาว', 'F1', 'เชียงใหม่', NULL, NULL, NULL),
('11122', 'รพ.ดอยสะเก็ด', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11123', 'รพ.แม่แตง', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11124', 'รพ.สะเมิง', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11125', 'รพ.ฝาง', 'M1', 'เชียงใหม่', NULL, NULL, NULL),
('11126', 'รพ.แม่อาย', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11127', 'รพ.พร้าว', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11128', 'รพ.สันป่าตอง', 'M2', 'เชียงใหม่', NULL, NULL, NULL),
('11129', 'รพ.สันกำแพง', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11130', 'รพ.สันทราย', 'M2', 'เชียงใหม่', NULL, NULL, NULL),
('11131', 'รพ.หางดง', 'F1', 'เชียงใหม่', NULL, NULL, NULL),
('11132', 'รพ.ฮอด', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11133', 'รพ.ดอยเต่า', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11134', 'รพ.อมก๋อย', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11135', 'รพ.สารภี', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11136', 'รพ.เวียงแหง', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11137', 'รพ.ไชยปราการ', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11138', 'รพ.แม่วาง', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11139', 'รพ.แม่ออน', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('11140', 'รพ.แม่ทา', 'F2', 'ลำพูน', NULL, NULL, NULL),
('11141', 'รพ.บ้านโฮ่ง', 'F2', 'ลำพูน', NULL, NULL, NULL),
('11142', 'รพ.ลี้', 'F1', 'ลำพูน', NULL, NULL, NULL),
('11143', 'รพ.ทุ่งหัวช้าง', 'F2', 'ลำพูน', NULL, NULL, NULL),
('11144', 'รพ.ป่าซาง', 'F1', 'ลำพูน', NULL, NULL, NULL),
('11145', 'รพ.บ้านธิ', 'F2', 'ลำพูน', NULL, NULL, NULL),
('11146', 'รพ.แม่เมาะ', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11147', 'รพ.เกาะคา', 'M2', 'ลำปาง', NULL, NULL, NULL),
('11148', 'รพ.เสริมงาม', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11149', 'รพ.งาว', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11150', 'รพ.แจ้ห่ม', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11151', 'รพ.วังเหนือ', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11152', 'รพ.เถิน', 'M2', 'ลำปาง', NULL, NULL, NULL),
('11153', 'รพ.แม่พริก', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11154', 'รพ.แม่ทะ', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11155', 'รพ.สบปราบ', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11156', 'รพ.ห้างฉัตร', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11157', 'รพ.เมืองปาน', 'F2', 'ลำปาง', NULL, NULL, NULL),
('11166', 'รพ.ร้องกวาง', 'F2', 'แพร่', NULL, NULL, NULL),
('11167', 'รพ.ลอง', 'F2', 'แพร่', NULL, NULL, NULL),
('11169', 'รพ.สูงเม่น', 'F2', 'แพร่', NULL, NULL, NULL),
('11170', 'รพ.สอง', 'F2', 'แพร่', NULL, NULL, NULL),
('11171', 'รพ.วังชิ้น', 'F2', 'แพร่', NULL, NULL, NULL),
('11172', 'รพ.หนองม่วงไข่', 'F2', 'แพร่', NULL, NULL, NULL),
('11173', 'รพ.แม่จริม', 'F2', 'น่าน', NULL, NULL, NULL),
('11174', 'รพ.บ้านหลวง', 'F2', 'น่าน', NULL, NULL, NULL),
('11175', 'รพ.นาน้อย', 'F2', 'น่าน', NULL, NULL, NULL),
('11176', 'รพ.ท่าวังผา', 'F2', 'น่าน', NULL, NULL, NULL),
('11177', 'รพ.เวียงสา', 'F2', 'น่าน', NULL, NULL, NULL),
('11178', 'รพ.ทุ่งช้าง', 'F2', 'น่าน', NULL, NULL, NULL),
('11179', 'รพ.เชียงกลาง', 'F2', 'น่าน', NULL, NULL, NULL),
('11180', 'รพ.นาหมื่น', 'F2', 'น่าน', NULL, NULL, NULL),
('11181', 'รพ.สันติสุข', 'F2', 'น่าน', NULL, NULL, NULL),
('11182', 'รพ.บ่อเกลือ', 'F2', 'น่าน', NULL, NULL, NULL),
('11183', 'รพ.สองแคว', 'F2', 'น่าน', NULL, NULL, NULL),
('11184', 'รพ.จุน', 'F2', 'พะเยา', NULL, NULL, NULL),
('11185', 'รพ.เชียงม่วน', 'F2', 'พะเยา', NULL, NULL, NULL),
('11186', 'รพ.ดอกคำใต้', 'F2', 'พะเยา', NULL, NULL, NULL),
('11187', 'รพ.ปง', 'F2', 'พะเยา', NULL, NULL, NULL),
('11188', 'รพ.แม่ใจ', 'F2', 'พะเยา', NULL, NULL, NULL),
('11189', 'รพ.เทิง', 'F1', 'เชียงราย', NULL, NULL, NULL),
('11190', 'รพ.พาน', 'F1', 'เชียงราย', NULL, NULL, NULL),
('11191', 'รพ.ป่าแดด', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11192', 'รพ.แม่จัน', 'M2', 'เชียงราย', NULL, NULL, NULL),
('11193', 'รพ.เชียงแสน', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11194', 'รพ.แม่สาย', 'M2', 'เชียงราย', NULL, NULL, NULL),
('11195', 'รพ.แม่สรวย', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11196', 'รพ.เวียงป่าเป้า', 'F1', 'เชียงราย', NULL, NULL, NULL),
('11197', 'รพ.พญาเม็งราย', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11198', 'รพ.เวียงแก่น', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11199', 'รพ.ขุนตาล', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11200', 'รพ.แม่ฟ้าหลวง', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11201', 'รพ.แม่ลาว', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11202', 'รพ.เวียงเชียงรุ้ง', 'F2', 'เชียงราย', NULL, NULL, NULL),
('11203', 'รพ.ขุนยวม', 'F2', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11204', 'รพ.ปาย', 'F1', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11205', 'รพ.แม่สะเรียง', 'M2', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11206', 'รพ.แม่ลาน้อย', 'F2', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11207', 'รพ.สบเมย', 'F2', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11208', 'รพ.ปางมะผ้า', 'F2', 'แม่ฮ่องสอน', NULL, NULL, NULL),
('11452', 'รพ.สมเด็จพระยุพราชเด่นชัย', 'F1', 'แพร่', NULL, NULL, NULL),
('11453', 'รพ.สมเด็จพระยุพราชปัว', 'M2', 'น่าน', NULL, NULL, NULL),
('11454', 'รพ.สมเด็จพระยุพราชเชียงของ', 'F1', 'เชียงราย', NULL, NULL, NULL),
('11625', 'รพ.เฉลิมพระเกียรติ', 'F2', 'น่าน', NULL, NULL, NULL),
('11643', 'รพ.ดอยหล่อ', 'F2', 'เชียงใหม่', NULL, NULL, NULL),
('15012', 'รพ.สมเด็จพระญาณสังวร', 'F2', 'เชียงราย', NULL, NULL, NULL),
('23736', 'รพ.วัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา', 'F3', 'เชียงใหม่', NULL, NULL, NULL),
('24956', 'รพ.เวียงหนองล่อง', 'F3', 'ลำพูน', NULL, NULL, NULL),
('25017', 'รพ.ภูเพียง', 'F3', 'น่าน', NULL, NULL, NULL),
('28823', 'รพ.ดอยหลวง', 'F3', 'เชียงราย', NULL, NULL, NULL),
('40744', 'รพ.ภูซาง', 'F3', 'พะเยา', NULL, NULL, NULL),
('40745', 'รพ.ภูกามยาว', 'F3', 'พะเยา', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
