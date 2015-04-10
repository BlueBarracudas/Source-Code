-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema jobit
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jobit
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jobit` DEFAULT CHARACTER SET utf8 ;
USE `jobit` ;

-- -----------------------------------------------------
-- Table `jobit`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`account` (
  `account_id` VARCHAR(16) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password` VARCHAR(150) NOT NULL,
  `account_type` INT(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE INDEX `Account_ID_UNIQUE` (`account_id` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`administrator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`administrator` (
  `admin_id` VARCHAR(16) NOT NULL,
  `account_id` VARCHAR(16) NOT NULL,
  `active` INT(11) NOT NULL,
  `type` INT(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE INDEX `Admin_ID_UNIQUE` (`admin_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`applicant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`applicant` (
  `applicant_id` VARCHAR(16) NOT NULL,
  `account_id` VARCHAR(16) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birthday` DATE NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `contact_number` VARCHAR(150) NOT NULL,
  `marital_status` VARCHAR(45) NOT NULL,
  `sex` CHAR(1) NOT NULL,
  `notification_type` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`applicant_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`applicantprofile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`applicantprofile` (
  `applicant_profile_id` VARCHAR(16) NOT NULL,
  `applicant_id` VARCHAR(16) NOT NULL,
  `HS_name` VARCHAR(45) NOT NULL,
  `college_name` VARCHAR(45) NOT NULL,
  `course` VARCHAR(45) NOT NULL,
  `skills` VARCHAR(45) NOT NULL,
  `work_experience` VARCHAR(45) NULL DEFAULT NULL,
  `certificates` VARCHAR(45) NULL DEFAULT NULL,
  `resume_pdf` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`applicant_profile_id`),
  UNIQUE INDEX `applicant_profile_id_UNIQUE` (`applicant_profile_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`application`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`application` (
  `application_id` VARCHAR(16) NOT NULL,
  `applicant_id` VARCHAR(16) NOT NULL,
  `job_id` VARCHAR(16) NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `place` VARCHAR(150) NOT NULL,
  `notes` VARCHAR(150) NULL DEFAULT NULL,
  `decision` INT(11) NULL DEFAULT NULL,
  `decision_message` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  UNIQUE INDEX `Appointment_ID_UNIQUE` (`application_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`certificate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`certificate` (
  `certificate_id` INT NOT NULL AUTO_INCREMENT,
  `applicant_id` VARCHAR(16) NOT NULL,
  `name` VARCHAR(100) NULL,
  /*`abbrev` VARCHAR(45) NULL,*/
  PRIMARY KEY (`certificate_id`),
  UNIQUE INDEX `certificate_id_UNIQUE` (`certificate_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`company` (
  `company_id` VARCHAR(16) NOT NULL,
  `account_id` VARCHAR(16) NOT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `address` VARCHAR(45) NULL DEFAULT NULL,
  `contact_no` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(150) NULL DEFAULT NULL,
  `company_img` VARCHAR(45) NULL DEFAULT NULL,
  `type` VARCHAR(50) NULL DEFAULT NULL,
  `notification_type` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE INDEX `Company_ID_UNIQUE` (`company_id` ASC),
  UNIQUE INDEX `Account_ID_UNIQUE` (`account_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`feedback`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`feedback` (
  `feedback_id` VARCHAR(16) NOT NULL,
  `company_id` VARCHAR(16) NOT NULL,
  `applicant_id` VARCHAR(16) NOT NULL,
  `notes` VARCHAR(150) NULL DEFAULT NULL,
  `decision` INT(11) NOT NULL,
  PRIMARY KEY (`feedback_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`joblisting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`joblisting` (
  `job_id` VARCHAR(16) NOT NULL,
  `company_id` VARCHAR(16) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150) NOT NULL,
  `work_experience` VARCHAR(300) NOT NULL,
  `salary` FLOAT NULL DEFAULT NULL,
  `work_hours` VARCHAR(150) NOT NULL,
  `slots_available` INT(11) NOT NULL,
  `skill_tag` VARCHAR(300) NULL DEFAULT NULL,
  `course_tag` VARCHAR(300) NULL DEFAULT NULL,
  `joblist_pdf` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE INDEX `Job_ID_UNIQUE` (`job_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`skill`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`skill` (
  `skill_id` INT NOT NULL AUTO_INCREMENT,
  `applicant_id` VARCHAR(16) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE INDEX `skill_id_UNIQUE` (`skill_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jobit`.`work_experience`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobit`.`work_experience` (
  `work_experience_id` INT NOT NULL AUTO_INCREMENT,
  `applicant_id` VARCHAR(16) NOT NULL,
  `work_title` VARCHAR(100) NOT NULL,
  `years` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`work_experience_id`),
  UNIQUE INDEX `work_experience_id_UNIQUE` (`work_experience_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
