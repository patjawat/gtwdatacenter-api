-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 43.229.149.13    Database: back_office
-- ------------------------------------------------------
-- Server version	5.6.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `supplies_group`
--

LOCK TABLES `supplies_group` WRITE;
/*!40000 ALTER TABLE `supplies_group` DISABLE KEYS */;
INSERT INTO `supplies_group` VALUES ('00','วัสดุที่ไม่ใช่ครุภัณฑ์','True','2021-01-03 20:27:24',NULL),('04','ครุภัณฑ์สำนักงาน','True','2019-11-28 14:19:21',NULL),('10','อาวุธ','True','2019-11-28 13:23:13',NULL),('11','สรรพาวุธนิวเคลียร์','True','2019-11-28 13:23:12',NULL),('12','อุปกรณ์ควบคุมการยิง','True','2019-11-28 13:20:04',NULL),('13','กระสุนและวัตถุระเบิด','True',NULL,NULL),('14','อาวุธนำวิถี','True',NULL,NULL),('15','อากาศยานและองค์ประกอบโครงสร้าง','True',NULL,NULL),('16','ส่วนประกอบอากาศยานและเครื่องใช้','True',NULL,NULL),('17','อุปกรณ์การยิงส่ง การลงพื้น และการยกขนทางพื้นดิน','True',NULL,NULL),('18','ยานอวกาศ','True',NULL,NULL),('19','เรือ เรือเล็ก เรือท้องแบน และอู่ลอย','True',NULL,NULL),('20','เรือและอุปกรณ์สำหรับเรือ','True',NULL,NULL),('22','อุปกรณ์รถไฟ','True',NULL,NULL),('23','ยานพาหนะพื้นดิน ยานยนต์ รถพ่วง และจักรยาน','True',NULL,NULL),('24','รถลากจูง','True',NULL,NULL),('25','ส่วนประกอบของยานพาหนะ','True',NULL,NULL),('26','ยางนอกและยางใน','True',NULL,NULL),('28','เครื่องยนต์ เทอร์ไบน์ และส่วนประกอบ','True',NULL,NULL),('29','ส่วนประกอบของเครื่องยนต์','True',NULL,NULL),('30','อุปกรณ์การส่งผ่านกำลังงานกล','True',NULL,NULL),('31','รองเพลา','True',NULL,NULL),('32','อุปกรณ์และเครื่องจักรงานไม้','True',NULL,NULL),('34','เครื่องจักรงานโลหะ','True',NULL,NULL),('35','อุปกรณ์การบริการ','True',NULL,NULL),('36','เครื่องจักรกล เฉพาะงาน อุตสาหกรรม','True',NULL,NULL),('37','เครื่องจักร และอุปกรณ์การเกษตร','True',NULL,NULL),('38','อุปกรณ์ก่อสร้าง การเหมืองแร่ การขุดดิน และการซ่อมบำรุงทาง','True',NULL,NULL),('39','อุปกรณ์การยกขนพัสดุ','True',NULL,NULL),('40','เชือก เคเบิล โซ่และเครื่องรัด','True',NULL,NULL),('41','อุปกรณ์ตู้เย็น เครื่องปรับอากาศ และเครื่องถ่ายเทอากาศ','True',NULL,NULL),('42','อุปกรณ์ผจญเพลิง เครื่องช่วยชีวิต และความปลอดภัย','True',NULL,NULL),('43','สูบ และเครื่องอัด','True',NULL,NULL),('44','เตาหลอมโรงไอน้ำ และอุปกรณ์ทำให้แห้ง และปฏิกรณ์นิวเคลียร์','True',NULL,NULL),('45','อุปกรณ์สุขภัณฑ์ เครื่องให้ความร้อน และการสุขาภิบาล','True',NULL,NULL),('46','เครื่องกรองน้ำ และเครื่องขจัดสิ่งโสโครก','True',NULL,NULL),('47','ท่อหลอด ท่อยาง และจุกอัด','True',NULL,NULL),('48','วาล์ว (valve)','True',NULL,NULL),('49','อุปกรณ์การซ่อมบำรุง และโรงงานซ่อม','True',NULL,NULL),('51','เครื่องมือ','True',NULL,NULL),('52','เครื่องวัด','True',NULL,NULL),('53','เครื่องใช้ และวัสดุขัด','True',NULL,NULL),('54','โครงสร้างถอดประกอบได้ และนั่งร้าน','True',NULL,NULL),('55','กระดาน ไม้อัด ไม้แปรรูป และไม้เคลือบ (วีเนีย)','True',NULL,NULL),('56','วัสดุการสร้างอาคาร และสิ่งก่อสร้าง','True',NULL,NULL),('58','อุปกรณ์คมนาคม การค้นหา และการกระจายคลื่น','True',NULL,NULL),('59','อุปกรณ์ และส่วนประกอบ เครื่องไฟฟ้า และเครื่องอีเลคโทรนิค','True',NULL,NULL),('61','สายไฟ เครื่องกำเนิดไฟฟ้า และอุปกรณ์จ่ายไฟฟ้า','True',NULL,NULL),('62','หลอดไฟ และอุปกรณ์ติดตั้งเครื่องให้แสงสว่าง','True',NULL,NULL),('63','ระบบ เตือนภัย และสัญญาณ','True',NULL,NULL),('65','อุปกรณ์และเครื่องใช้ทางการแพทย์ ทันตแพทย์ และสัตวแพทย์','True',NULL,NULL),('66','เครื่องมือ และอุปกรณ์ห้องปฏิบัติการ (ทดลอง)','True',NULL,NULL),('67','อุปกรณ์การภาพ','True',NULL,NULL),('68','วัตถุเคมี และผลิตภัณฑ์เคมี','True',NULL,NULL),('69','เครื่องช่วยฝึก และอุปกรณ์','True',NULL,NULL),('71','เครื่องตกแต่ง','True',NULL,NULL),('72','เครื่องใช้ และเครื่องตกแต่งบ้าน และร้านค้า','True',NULL,NULL),('73','อุปกรณ์ประกอบอาหาร และเลี้ยงดู','True',NULL,NULL),('74','เครื่องกลสำนักงาน และอุปกรณ์กรรมวิธีบันทึก และลงข้อมูล','True',NULL,NULL),('75','พัสดุ และเครื่องใช้สำนักงาน','True',NULL,NULL),('76','หนังสือแผนที่ และสิ่งพิมพ์','True',NULL,NULL),('77','เครื่องดนตรี เครื่องเล่นแผ่นเสียง และวิทยุใช้ในบ้าน','True',NULL,NULL),('78','อุปกรณ์สันทนาการ และการกีฬา','True',NULL,NULL),('79','อุปกรณ์ และอุปกรณ์ทำความสะอาด','True',NULL,NULL),('80','แปรง และภู่กัน สีวัสดุยาอุด และผนึก','True',NULL,NULL),('81','ภาชนะบรรจุหีบห่อ','True',NULL,NULL),('83','สิ่งถักทอ หนัง ขนสัตว์ เครื่องตกแต่ง อุปกรณ์เย็บรองเท้า กระโ','True',NULL,NULL),('84','เสื้อผ้า อุปกรณ์ประจำกาย และเครื่องแบบ','True',NULL,NULL),('85','เครื่องสุขภัณฑ์ และเครื่องสำอางค์','True',NULL,NULL),('87','อุปกรณ์การเกษตร','True',NULL,NULL),('88','สัตว์เลี้ยง','True',NULL,NULL),('89','อาหาร','True',NULL,NULL),('91','เชื้อเพลิง น้ำมันหล่อลื่น น้ำมันเครื่อง และขี้ผึ้ง','True',NULL,NULL),('93','สิ่งประดิษฐ์ที่ไม่ใช่โลหะ','True',NULL,NULL),('94','วัตถุดิบที่ไม่ใช่โลหะ','True',NULL,NULL),('95','โลหะที่เป็นแท่ง แผ่นและมีทรง','True',NULL,NULL),('96','สินแร่ แร่ และผลิตภัณฑ์ขั้นต้นจากสินแร่','True',NULL,NULL),('99','เบ็ดเตล็ด','True',NULL,NULL);
/*!40000 ALTER TABLE `supplies_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-19 23:05:44
