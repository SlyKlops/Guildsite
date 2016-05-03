-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=1;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=1;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema SLSite
-- -----------------------------------------------------
-- This is the database for content from the Silver Linings guildsite.
DROP SCHEMA IF EXISTS `SLSite` ;

-- -----------------------------------------------------
-- Schema SLSite
--
-- This is the database for content from the Silver Linings guildsite.
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SLSite` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `SLSite` ;

-- -----------------------------------------------------
-- Table `SLSite`.`USER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`USER` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(70) NOT NULL,
  `Email` VARCHAR(70) NOT NULL,
  `Password` BLOB NOT NULL,
  `numCharacters` INT NULL DEFAULT 0,
  `numPosts` INT NULL DEFAULT 0,
  `numThreads` INT NULL DEFAULT 0,
  `Intro_Statement` VARCHAR(255) NULL,
  `Join_Date` DATE NULL,
  `Last_Active` DATETIME DEFAULT NOW(),
  PRIMARY KEY (`ID`, `Username`))
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE UNIQUE INDEX `Username_UNIQUE` ON `SLSite`.`USER` (`Username` ASC);

CREATE UNIQUE INDEX `Email_UNIQUE` ON `SLSite`.`USER` (`Email` ASC);

-- -----------------------------------------------------
-- Table `SLSite`.`USER_FAMILY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`USER_FAMILY` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USER_ID` INT NOT NULL,
  `Family_Name` VARCHAR(45) NULL,
  `Server` ENUM('Uno','Orwen','Edan') NULL,
  PRIMARY KEY (`ID`, `USER_ID`),
  CONSTRAINT `fk_User_Family`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_User_Family_idx` ON `SLSite`.`USER_FAMILY` (`USER_ID` ASC);

-- -----------------------------------------------------
-- Table `SLSite`.`CHARACTERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`CHARACTERS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USER_ID` INT NOT NULL,
  `FAMILY_ID` INT NOT NULL,
  `Name` VARCHAR(45) NULL,
  `Title` VARCHAR(45) NULL,
  `Class` ENUM('Witch','Wizard','Warrior','Valkyrie','Sorceress','Berserker','Tamer','Ninja','Kunoichi','Blader','Plum') NULL,
  `Level` INT NULL,
  `Energy` INT NULL,
  `Contribution_Points` INT NULL,
  PRIMARY KEY (`ID`, `USER_ID`, `FAMILY_ID`),
  CONSTRAINT `fk_User_Characters`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_User_Characters_idx` ON `SLSite`.`CHARACTERS` (`USER_ID` ASC);


-- -----------------------------------------------------
-- Table `SLSite`.`GUILD_MEMBERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`GUILD_MEMBERS` (
  `USER_ID` INT NOT NULL,
  `Contracted` TINYINT(1) NULL DEFAULT 0,
  `Rank` ENUM('Master','Officer','Member') NULL DEFAULT 'Member',
  `Activity_Points` INT NULL DEFAULT 0,
  PRIMARY KEY (`USER_ID`),
  CONSTRAINT `fk_User_GuildMembers`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SLSite`.`THREADS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`THREADS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `POSTING_USER_ID` INT NULL,
  `RECENT_USER_ID` INT NULL,
  `Title` VARCHAR(255) NULL,
  `Sticky` TINYINT(1) NULL,
  `Posts` INT NULL,
  `Post_Date` TIMESTAMP NULL DEFAULT NOW(),
  `Last_Active` TIMESTAMP NULL DEFAULT NOW(),
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_Thread_User_Post`
    FOREIGN KEY (`POSTING_USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Thread_Recent_User`
    FOREIGN KEY (`RECENT_USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_Thread_User_Post_idx` ON `SLSite`.`THREADS` (`POSTING_USER_ID` ASC);

CREATE INDEX `fk_Thread_Recent_User_idx` ON `SLSite`.`THREADS` (`RECENT_USER_ID` ASC);


-- -----------------------------------------------------
-- Table `SLSite`.`POSTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`POSTS` (
  `ID` INT NULL AUTO_INCREMENT,
  `THREAD_ID` INT NOT NULL,
  `POSTING_USER_ID` INT NULL,
  `Content` VARCHAR(255) NULL,
  `Time_Posted` TIMESTAMP NULL DEFAULT NOW(),
  PRIMARY KEY (`ID`,`THREAD_ID`),
  CONSTRAINT `fk_Posting_User_ID`
    FOREIGN KEY (`POSTING_USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Thread_Post`
    FOREIGN KEY (`THREAD_ID`)
    REFERENCES `SLSite`.`THREADS` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1;

CREATE INDEX `fk_Posting_User_ID_idx` ON `SLSite`.`POSTS` (`POSTING_USER_ID` ASC);


-- -----------------------------------------------------
-- Table `SLSite`.`CHARACTER_PRODUCTION_LEVELS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`CHARACTER_PRODUCTION_LEVELS` (
  `CHARACTERS_ID` INT NOT NULL,
  `Health` INT NULL,
  `Breath` INT NULL,
  `Strength` INT NULL,
  `Gathering` VARCHAR(45) NULL,
  `Processing` VARCHAR(45) NULL,
  `Farming` VARCHAR(45) NULL,
  `Fishing` VARCHAR(45) NULL,
  `Alchemy` VARCHAR(45) NULL,
  `Training` VARCHAR(45) NULL,
  `Trade` VARCHAR(45) NULL,
  `Cooking` VARCHAR(45) NULL,
  PRIMARY KEY (`CHARACTERS_ID`),
  CONSTRAINT `fk_CharactersID_Production`
    FOREIGN KEY (`CHARACTERS_ID`)
    REFERENCES `SLSite`.`CHARACTERS` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SLSite`.`CHARACTER_STATS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`CHARACTER_STATS` (
  `CHARACTERS_ID` INT NOT NULL,
  `HP` INT NULL,
  `Resource` INT NULL,
  `AP` INT NULL,
  `DP` INT NULL,
  `Attack_Speed` INT NULL,
  `Casting_Speed` INT NULL,
  `Movement_Speed` INT NULL,
  `Fishing_Speed` INT NULL,
  PRIMARY KEY (`CHARACTERS_ID`),
  CONSTRAINT `fk_CharactersID_Stats`
    FOREIGN KEY (`CHARACTERS_ID`)
    REFERENCES `SLSite`.`CHARACTERS` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SLSite`.`ONLINE_STATUS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`ONLINE_STATUS` (
  `USER_ID` INT NOT NULL,
  `Online` TINYINT(1) NULL,
  `Last_Login` TIMESTAMP NULL,
  PRIMARY KEY (`USER_ID`),
  CONSTRAINT `fk_UserID_status`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `SLSite`.`USER` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


USE `SLSite` ;

-- -----------------------------------------------------
-- Placeholder table for view `SLSite`.`GUILD_ROSTER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SLSite`.`GUILD_ROSTER` (`Rank` INT, `Family_Name` INT, `Name` INT, `Class` INT, `Level` INT, `Energy` INT, `Contribution_Points` INT);

-- -----------------------------------------------------
-- View `SLSite`.`GUILD_ROSTER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `SLSite`.`GUILD_ROSTER`;
USE `SLSite`;
CREATE  OR REPLACE VIEW `GUILD_ROSTER` AS SELECT `GUILD_MEMBERS`.`Rank`, `USER_FAMILY`.`Family_Name`, `CHARACTERS`.`Name`, `CHARACTERS`.`Class`, `CHARACTERS`.`Level`, `CHARACTERS`.`Energy`, `CHARACTERS`.`Contribution_Points` FROM `USER`
LEFT JOIN (`USER_FAMILY`) ON `USER`.ID = `USER_FAMILY`.USER_ID
LEFT JOIN (`GUILD_MEMBERS`) ON `USER`.ID = `GUILD_MEMBERS`.USER_ID
LEFT JOIN (`CHARACTERS`) ON `USER`.ID = `CHARACTERS`.USER_ID
ORDER BY `Rank` DESC;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
