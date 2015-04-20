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
INSERT INTO `account` VALUES ('10001','ptrck.esquillo@gmail.com','qwer1234',0),('10002','testing@domain.com','1234',1),('10003','occs@dlsu.edu.ph','1234',2),('10004','info@smart.net','1234',2),('10005','info@recruiterbox.com','1234',2),('10006','admin@experts.com','1234',1),('10007','raymund@experts.com','1234',1),('10008','hr@deltaman.ph','delta',2),('10009','mrsantos@experts.com','santos123',1),('10010','sample@domain.com','1234',1),('10011','jared.pangilinan@gmail.com','1234',0),('10012','regina.balajadia@gmail.com','1234',0);
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
  `active` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `Admin_ID_UNIQUE` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES ('10001','10002',1,1),('10002','10006',1,2),('10003','10007',0,1),('10004','10009',0,1),('10005','10010',0,1);
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
  `account_id` varchar(16) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(150) NOT NULL,
  `contact_number` varchar(150) NOT NULL,
  `marital_status` varchar(45) NOT NULL,
  `sex` char(1) NOT NULL,
  `notification_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant`
--

LOCK TABLES `applicant` WRITE;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` VALUES ('10001','10001','Lance Patrick','Ramos','Esquillo','1996-07-10','Tanay, Rizal','Manila','09152824229','Single','M',1),('10002','10011','Jared Luke','Santos','Pangilinan','1996-08-03','San Juan City','Manila','09182323451','Single','M',1),('10003','10012','Regina Claire','Cruz','Balajadia','1996-02-05','Taft','Manila','09123616112','Single','F',1);
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicantprofile`
--

DROP TABLE IF EXISTS `applicantprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicantprofile` (
  `applicant_profile_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `HS_name` varchar(45) NOT NULL,
  `college_name` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `skills` varchar(45) NOT NULL,
  `work_experience` varchar(45) DEFAULT NULL,
  `certificates` varchar(45) DEFAULT NULL,
  `resume_pdf` varchar(45) DEFAULT NULL,
  `profile_picture` varchar(45) NOT NULL,
  PRIMARY KEY (`applicant_profile_id`),
  UNIQUE KEY `applicant_profile_id_UNIQUE` (`applicant_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicantprofile`
--

LOCK TABLES `applicantprofile` WRITE;
/*!40000 ALTER TABLE `applicantprofile` DISABLE KEYS */;
INSERT INTO `applicantprofile` VALUES ('10001','10001','La Salle College Antipolo','De La Salle University','Computer Science','Knowledgable in PHP, Java, CSS, HTML','N/A','CCNA','resume_10001.pdf','apic_10001.jpg'),('10002','10002','La Salle Greenhills','De La Salle University','Computer Engineering','Knowledgable in PHP, Java, CSS, HTML','N/A','CCNA','resume_10002.pdf','apic_10002.jpg'),('10003','10003','UP-IS','De La Salle University','Information Technology','Good at leading a team, great ui engineer','N/A','CCNA','resume_10003.pdf','apic_10003.jpg');
/*!40000 ALTER TABLE `applicantprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `application_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `company_id` varchar(16) DEFAULT NULL,
  `job_id` varchar(16) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `place` varchar(150) DEFAULT NULL,
  `notes` varchar(150) DEFAULT NULL,
  `decision` int(11) DEFAULT NULL,
  `decision_message` varchar(150) DEFAULT NULL,
  `is_interviewed` int(1) DEFAULT '0',
  PRIMARY KEY (`application_id`),
  UNIQUE KEY `Appointment_ID_UNIQUE` (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES ('10001','10002','10001','10001','2015-04-22','08:00:00',NULL,NULL,NULL,'hehe',0),('10002','10001','10003','10003','2015-04-11','08:00:00',NULL,NULL,NULL,NULL,1),('10003','10001','10001','10001','2015-04-16','18:00:00',NULL,NULL,NULL,'None yet',0),('10004','10003','10003','10003','2015-04-17','13:00:00',NULL,NULL,NULL,NULL,1),('10005','10002','10002','10002','2015-04-25','08:00:00',NULL,NULL,NULL,NULL,0),('10006','10003','10002','10002','2015-04-07','08:00:00',NULL,NULL,NULL,NULL,1),('10007','10003','10001','10001','2015-04-07','10:00:00',NULL,NULL,NULL,'Sssup',1);
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificate`
--

DROP TABLE IF EXISTS `certificate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name` varchar(150) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `competency` int(11) NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '0',
  `date_completed` date DEFAULT NULL,
  PRIMARY KEY (`certificate_id`),
  UNIQUE KEY `certificate_id_UNIQUE` (`certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificate`
--

LOCK TABLES `certificate` WRITE;
/*!40000 ALTER TABLE `certificate` DISABLE KEYS */;
INSERT INTO `certificate` VALUES (10001,'CCNA',10001,1,1,'2015-04-10'),(10002,'CCNP',10001,0,1,'2015-03-21'),(10003,'CCNP',10002,0,1,'2014-02-15'),(10004,'CCIE',10002,1,1,'2014-08-21'),(10005,'CCNA',10003,1,1,'2013-07-10'),(10006,'CCIE',10003,1,1,'2014-08-09');
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certjoblisting`
--

DROP TABLE IF EXISTS `certjoblisting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certjoblisting` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `complecency` int(11) NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certjoblisting`
--

LOCK TABLES `certjoblisting` WRITE;
/*!40000 ALTER TABLE `certjoblisting` DISABLE KEYS */;
/*!40000 ALTER TABLE `certjoblisting` ENABLE KEYS */;
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
  `address` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `company_img` varchar(45) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `notification_type` int(11) DEFAULT NULL,
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
INSERT INTO `company` VALUES ('10001','10003','OCCS DLSU','Malate, Manila','1234','OCCS ROCKS!','default.jpg',NULL,NULL),('10002','10004','Smart Communications','BGC, Makati','1234','Smart is better than globe','default.jpg',NULL,NULL),('10003','10005','Recruiter Box','Bengaluru, India','1234','recruiterbox.com','default.jpg',NULL,NULL),('10004','10008',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  `job_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `notes` varchar(150) DEFAULT NULL,
  `decision` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('1','10001','10001','10003','None',0),('2','10001','10001','10003','None',0);
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
  `total_slots` int(11) NOT NULL,
  `slots_available` int(11) NOT NULL,
  `skill_tag` varchar(300) DEFAULT NULL,
  `course_tag` varchar(300) DEFAULT NULL,
  `joblist_pdf` varchar(150) NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `Job_ID_UNIQUE` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joblisting`
--

LOCK TABLES `joblisting` WRITE;
/*!40000 ALTER TABLE `joblisting` DISABLE KEYS */;
INSERT INTO `joblisting` VALUES ('10001','10001','Lead Developer','Blah blah','Malate, Manila','4',10000,'8',8,3,'Knowledgable in almost all programming languages, Can lead a team, Hardworking','Computer Science, Computer Engineering, Information Techonology','jlpdf_10001.pdf'),('10002','10002','Analyst','Excellent at creating UI\'s error free, and can code in PHP not only in JS','BGC, Makati','2',80000,'8',5,2,'Knowledgable in PHP, Java, CSS, bootstrap','Computer Science, Information Technology','jlpdf_10002.pdf'),('10003','10003','UI/UX Engineer','Good at creating UX/UI for any software/mobile application','Ortigas','3',90000,'8',2,2,'Knows how to code in any language, Skills in photoshop is a plus','Computer Science, Animation, Any certification','jlpdf_10003.pdf');
/*!40000 ALTER TABLE `joblisting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `skill_id_UNIQUE` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_experience`
--

DROP TABLE IF EXISTS `work_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_experience` (
  `work_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(16) NOT NULL,
  `work_title` varchar(100) NOT NULL,
  `years` varchar(45) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  PRIMARY KEY (`work_experience_id`),
  UNIQUE KEY `work_experience_id_UNIQUE` (`work_experience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_experience`
--

LOCK TABLES `work_experience` WRITE;
/*!40000 ALTER TABLE `work_experience` DISABLE KEYS */;
INSERT INTO `work_experience` VALUES (10001,'10001','Software Engineer','5','Smart Communications Inc.'),(10002,'10001','Product Tester','2','Globe '),(10003,'10002','Developer','3','ITS-DLSU'),(10004,'10002','UI/UX Engineer','4','Amazon'),(10005,'10003','Java Developer','3','Facebook'),(10006,'10003','UI Designer','1','Google');
/*!40000 ALTER TABLE `work_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workexpjoblisting`
--

DROP TABLE IF EXISTS `workexpjoblisting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workexpjoblisting` (
  `work_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `years` int(11) NOT NULL,
  PRIMARY KEY (`work_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workexpjoblisting`
--

LOCK TABLES `workexpjoblisting` WRITE;
/*!40000 ALTER TABLE `workexpjoblisting` DISABLE KEYS */;
/*!40000 ALTER TABLE `workexpjoblisting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-20 16:21:51
