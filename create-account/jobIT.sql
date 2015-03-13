-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: jobit
-- ------------------------------------------------------
-- Server version	5.6.23-log

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `account_id` varchar(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `account_type` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `Account_ID_UNIQUE` (`account_id`),
  UNIQUE KEY `Email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('100001','experts.prime@yahoo.com','experts!',1),('100002','ptrck.esquillo@gmail.com','1234',0),('100003','david.sanchez@dlsu.edu.ph','david1234',0),('100004','info@smart.ph','gayjohn',2),('100005','john.doe@example.com','plre1997',0),('100006','ballsohard@kanye.com','kanye1234',0),('100007','ez@info.net','1234',2),('100008','barney@gmail.com','61231234',2),('100009','wewski@info.net','wewski1234',2),('100010','Fe_Cruz@experts.com','Cruz!',0),('100011','Rashard_Lewis@experts.com','Lewis!',0),('100012','Briane_Samson@experts.com','Samson!',0),('100013','jed@email.com','jedu1234',0),('100014','jonahsyfu@yahoo.com','amysorel',0),('100015','jederino@gmail.com','iammistertee',0),('100016','hue@hue.com','sex',0),('100017','puta@puta.puta','puta',0),('100018','lance.ptrck@gmail.com','jobitisthebest',0),('100019','pakshet@gmail.com','password',0),('100021','nate.dogg@gstar.net','mynigga',0),('100022','nicole.felices@gmail.com','1234',0),('100023','nl.rodrigo@gmail.com','iamrodirigo',0),('100024','info@globe.net','globewifi',2),('100025','ed.sheeran@gmail.com','1234',0),('100026','juan.pedro.dc@gmail.com','1234',0),('100027','jeduuu@email.com','12341234',0),('100028','aa@za.com','1234',0),('100029','regina.c.balajadia@gmail.com','abcdefg',0),('100030','asd@gmail.com','123',0),('100031','drake.jones@yahoo.com','legend',0),('100032','dlsu.its@dlsu.edu.ph','itsdlsu',2);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `admin_id` varchar(16) NOT NULL,
  `account_id` varchar(16) NOT NULL,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `Admin_ID_UNIQUE` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES ('1','11301010','1');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant` (
  `applicant_id` varchar(16) NOT NULL,
  `account_id` varchar(16) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `contact_number` varchar(150) NOT NULL,
  `marital_status` varchar(45) NOT NULL,
  `sex` char(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `certificate_id` varchar(45) NOT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant`
--

LOCK TABLES `applicant` WRITE;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` VALUES ('100001','100002','Patrick Lance','Ramos','Esquillo','1997-07-10','09152824229','Single','M','','','12345'),('100002','100003','David','S.','Sanchez','1996-01-01','09148245123','Single','M','','','12343'),('100003','100004','John','Roland','Doe','1987-07-10','09151235516','Single','M','','','12345'),('100004','100005','Kanye','E.','West','1989-08-17','654882314','Married','M','','','12345'),('120345','100010','Fe','Vidallon','Cruz','1986-11-01','09982315612','Single','F','','','12356'),('123245','100012','Briane','R.','Samson','1980-05-08','09156172823','Single','M','','','13466'),('167125','100011','Rashard','V.','Lewis','1993-02-23','09182239456','Single','M','','','12561'),('167126','100013','Jedu','Ci','Pangs','1995-11-09','123123','Single','M','','','12345'),('167127','100014','Jonah','Espiritu','Syfu','1996-05-10','09156203788','Divorced','M','','','12345'),('167128','100015','Jed','Tea','Pangilinan','1993-04-01','09152294567','Married','M','','','12345'),('167129','100016','hi','puta','gago','1996-01-02','6969696969','Widowed','M','','','12345'),('167130','100017','hi','puta','gago','1996-01-02','6969696969','Widowed','M','','','12345'),('167131','100017','puta','puta','puta','1947-01-01','6969696969','Widowed','M','','','12345'),('167132','100018','Lance','Robert','Patrick','1996-07-10','09152824229','Single','M','','','12345'),('167133','100019','hveruiher','sjvre','wew','1982-10-11','12345','Divorced','M','','','12345'),('167134','100021','Nate','Zeus','Dogg','1980-04-17','09151235612','Married','M','','','12345'),('167135','100022','Nicole','','Felices','1996-08-21','09175310821','Single','F','','','12345'),('167136','100023','Nicolai','','Rodrigo','1982-07-17','09151611643','Divorced','M','','','12345'),('167137','100025','Patrick','','Esquillo','1996-07-10','09152824229','Single','M','','','12345'),('167138','100026','Juan','','dela Cruz','1989-08-13','09189902234','Single','M','Taft, Manila','Filipino','12345'),('167139','100027','Jedu','','Pangss','1995-11-09','091111111','Single','M','over there','FIlipino','12345'),('167140','100028','raymun','beltran','delos santos','1995-02-02','09052124960','Single','M','manil','Filipino','12345'),('167141','100029','Regina Claire','Montances','Balajadia','1996-04-29','09178308670','Single','F','1260 11B One Miho Place Masangkay St., Sta. Cruz, Manila','Filipino','12345'),('167142','100030','asd','asd','asd','1996-02-01','asd','Single','M','asd','gihjok','12345'),('167143','100031','Drake','Smith','Jones','1983-02-18','09168892378','Single','M','Los Angeles, CA','American','12345');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `appointment_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `place` varchar(150) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  UNIQUE KEY `Appointment_ID_UNIQUE` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `company_id` varchar(16) NOT NULL,
  `account_id` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `Company_ID_UNIQUE` (`company_id`),
  UNIQUE KEY `Account_ID_UNIQUE` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES ('130001','100004','Smart Corporation',NULL,'Partner'),('130002','100007','EZ IT Services',NULL,'Non-Partner'),('130003','100008','Barney &amp; Friends Co.',NULL,'Partner'),('130004','100009','Wewski Inc.',NULL,'Partner'),('130005','100024','Globe',NULL,'Partner'),('130006','100032','',NULL,'Telecommunications');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `decision` tinyint(1) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joblisting`
--

DROP TABLE IF EXISTS `joblisting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joblisting` (
  `job_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `work_experience` varchar(300) NOT NULL,
  `salary` float DEFAULT NULL,
  `work_hours` varchar(150) NOT NULL,
  `slots_available` int(11) NOT NULL,
  `skill_tag` varchar(300) DEFAULT NULL,
  `course_tag` varchar(300) DEFAULT NULL,
  `pdf` varchar(150) NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `Job_ID_UNIQUE` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joblisting`
--

LOCK TABLES `joblisting` WRITE;
/*!40000 ALTER TABLE `joblisting` DISABLE KEYS */;
/*!40000 ALTER TABLE `joblisting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-13 13:44:41
