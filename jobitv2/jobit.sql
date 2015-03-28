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
INSERT INTO `account` VALUES ('100001','experts.prime@yahoo.com','experts!',1),('100002','ptrck.esquillo@gmail.com','1234',0),('100003','david_sanchez@dlsu.edu.ph','david!',0),('100004','joshua.guillarte@gmail.com','joshua!',0),('100005','info@smart.ph','smart!',2),('100006','info@globe.ph','globe!',2),('100007','paolo_ylag@dlsu.edu.ph','ylag!',0),('100008','deltaman@gmail.com','deltaman!',2),('100009','occs@dlsu.edu.ph','occs!',2);
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
INSERT INTO `administrator` VALUES ('1','100001','1');
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
INSERT INTO `applicant` VALUES ('100001','100002','Patrick Lance','Ramos','Esquillo','1997-07-10','09152824229','Single','M','','','12345'),('100002','100003','David','S.','Sanchez','1996-01-01','09148245123','Single','M','','','12343'),('100003','100004','Joshua','','Guillarte','1996-10-28','09178449901','Single','M','Antipolo, Rizal','Filipino','12345'),('100004','100007','Paolo','Yulo','Ylag','1996-07-05','09157740923','Single','M','BGC, Taguig','Filipino','12345');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicantprofile`
--

DROP TABLE IF EXISTS `applicantprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicantprofile` (
  `applicant_id` varchar(16) NOT NULL,
  `skills` varchar(45) NOT NULL,
  `school` varchar(45) NOT NULL,
  `college` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `certExams` varchar(45) NOT NULL,
  `jobtitle` varchar(45) NOT NULL,
  `workExp` varchar(45) NOT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicantprofile`
--

LOCK TABLES `applicantprofile` WRITE;
/*!40000 ALTER TABLE `applicantprofile` DISABLE KEYS */;
INSERT INTO `applicantprofile` VALUES ('100001','Knowledgable in PHP, Java, C','La Salle Greenhills','De La Salle University Manila','Computer Science','CCNA','Lead Developer','4');
/*!40000 ALTER TABLE `applicantprofile` ENABLE KEYS */;
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
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `company_img` varchar(45) DEFAULT NULL,
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
INSERT INTO `company` VALUES ('10001','100005','Smart Telecommunications Ltd.','Smart is better than globe.','Telecommunications',NULL,NULL,NULL),('10002','100006','','','Telecommunications',NULL,NULL,NULL),('10003','100008','Delta Management Services','Managerial Services on Events and many more','Software Solutions','Tanay, Rizal','6542639','default.jpg'),('10004','100009','','','Software Solutions',NULL,NULL,NULL);
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

-- Dump completed on 2015-03-24 22:19:42