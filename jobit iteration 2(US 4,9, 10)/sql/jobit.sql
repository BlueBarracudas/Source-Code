-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2015 at 02:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobit`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` varchar(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `account_type` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `Account_ID_UNIQUE` (`account_id`),
  UNIQUE KEY `Email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `email`, `password`, `account_type`) VALUES
('1', 'ptrck.esquillo@gmail.com', '1234', 0),
('2', 'testing@domain.com', '1234', 1),
('3', 'occs@dlsu.edu.ph', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` varchar(16) NOT NULL,
  `account_id` varchar(16) NOT NULL,
  `active` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `Admin_ID_UNIQUE` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `account_id`, `active`, `type`) VALUES
('10001', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
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

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `account_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `address`, `city`, `contact_number`, `marital_status`, `sex`, `notification_type`) VALUES
('1', '1', 'Lance Patrick', 'Ramos', 'Esquillo', '1996-07-10', 'Tanay, Rizal', 'Manila', '09152824229', 'single', 'M', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicantprofile`
--

CREATE TABLE IF NOT EXISTS `applicantprofile` (
  `applicant_profile_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `HS_name` varchar(45) NOT NULL,
  `college_name` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `skills` varchar(45) NOT NULL,
  `work_experience` varchar(45) DEFAULT NULL,
  `certificates` varchar(45) DEFAULT NULL,
  `resume_pdf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`applicant_profile_id`),
  UNIQUE KEY `applicant_profile_id_UNIQUE` (`applicant_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `job_id` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `place` varchar(150) NOT NULL,
  `notes` varchar(150) DEFAULT NULL,
  `decision` int(11) DEFAULT NULL,
  `decision_message` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  UNIQUE KEY `Appointment_ID_UNIQUE` (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `applicant_id`, `job_id`, `date`, `time`, `place`, `notes`, `decision`, `decision_message`) VALUES
('1', '1', '1', '0000-00-00', '00:00:00', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name` varchar(150) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `competency` int(11) NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`certificate_id`),
  UNIQUE KEY `certificate_id_UNIQUE` (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `certjoblisting`
--

CREATE TABLE IF NOT EXISTS `certjoblisting` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `competency` int(11) NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
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

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `account_id`, `name`, `address`, `contact_no`, `description`, `company_img`, `type`, `notification_type`) VALUES
('1', '3', 'OCCS DLSU', 'Malate, Manila', '1234', 'OCCS THE BEST THERE IS', 'default.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `applicant_id` varchar(16) NOT NULL,
  `notes` varchar(150) DEFAULT NULL,
  `decision` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `company_id`, `applicant_id`, `notes`, `decision`) VALUES
('1', '1', '2', '', 0),
('2', '1', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `joblisting`
--

CREATE TABLE IF NOT EXISTS `joblisting` (
  `job_id` varchar(16) NOT NULL,
  `company_id` varchar(16) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `work_experience` varchar(300) NOT NULL,
  `salary` float DEFAULT NULL,
  `work_hours` varchar(150) NOT NULL,
  `work_days` varchar(150) NOT NULL,
  `slots_available` int(11) NOT NULL,
  `total_slots` int(11) NOT NULL,
  `skill_tag` varchar(300) DEFAULT NULL,
  `course_tag` varchar(300) DEFAULT NULL,
  `joblist_pdf` varchar(150) NOT NULL,
  `certificate` varchar(300) DEFAULT NULL,
  `job_requirement` varchar(150) NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `Job_ID_UNIQUE` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joblisting`
--

INSERT INTO `joblisting` (`job_id`, `company_id`, `title`, `description`, `location`, `work_experience`, `salary`, `work_hours`, `work_days`, `slots_available`, `total_slots`, `skill_tag`, `course_tag`, `joblist_pdf`, `certificate`, `job_requirement`) VALUES
('1', '1', 'Procrammer', 'best', 'Philippines', '2', 999999, '8', 'Weekdays', 10, 10, 'JAVA, PHP', 'Computer Science', 'none.pdf', 'CCNA', 'College Procrammer');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `skill_id_UNIQUE` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workexpjoblisting`
--

CREATE TABLE IF NOT EXISTS `workexpjoblisting` (
  `work_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `years` int(11) NOT NULL,
  PRIMARY KEY (`work_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `work_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(16) NOT NULL,
  `work_title` varchar(100) NOT NULL,
  `years` varchar(45) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  PRIMARY KEY (`work_experience_id`),
  UNIQUE KEY `work_experience_id_UNIQUE` (`work_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
