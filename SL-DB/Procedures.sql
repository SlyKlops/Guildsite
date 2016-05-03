/**
 *	Procedures and Functions for Silver Linings guildsite
 *
 *	@author Chris Siegler
 */
 
 USE `SLSite`;
 
/**
 *	Procedure `Register_User`
 *
 *	Receives data from registration page to create new user
 *	Front end should validate before calling this procedure
 */
 
DROP PROCEDURE IF EXISTS `Register_User`;
 
DELIMITER //
CREATE PROCEDURE `Register_User` (IN UEmail VARCHAR(70), IN UName VARCHAR(70), IN UPwd VARCHAR(70))
BEGIN
	DECLARE UserID INT;
	INSERT INTO `USER`(Username, Email, `Password`, Join_Date) VALUES (UName, UEmail, UPwd, CURDATE());
    SET UserID = (SELECT ID FROM `USER` WHERE `Username` = UName);
    INSERT INTO `USER_FAMILY`(USER_ID, `Family_Name`,`Server`) VALUES (UserID, UName, 'Orwen');
    INSERT INTO `GUILD_MEMBERS`(USER_ID) VALUES (UserID);
END //
DELIMITER ;

/**
 *	Function `Validate_Username`
 *
 *	Returns TRUE if Username DOES NOT EXIST
 *	Returns FALSE if Username DOES EXIST
 */
 
DROP FUNCTION IF EXISTS `Validate_Username`;

DELIMITER //
CREATE FUNCTION `Validate_Username`(UName VARCHAR(70)) RETURNS BOOLEAN
BEGIN
	IF (SELECT count(*) FROM `USER` WHERE Username = UName) > 0 THEN
		RETURN FALSE;
	ELSEIF (SELECT count(*) FROM `USER` WHERE Username = UName) = 0 THEN
		RETURN TRUE;
	END IF;
END //
DELIMITER ;

/**
 *	Function `Validate_Email`
 *
 *	Returns TRUE if Email DOES NOT EXIST
 *	Returns FALSE if Email DOES EXIST
 */
 
DROP FUNCTION IF EXISTS `Validate_Username`;

DELIMITER //
CREATE FUNCTION `Validate_Username`(UEmail VARCHAR(70)) RETURNS BOOLEAN
BEGIN
	IF (SELECT count(*) FROM `USER` WHERE Email = UEmail) > 0 THEN
		RETURN FALSE;
	ELSEIF (SELECT count(*) FROM `USER` WHERE Email = UEmail) = 0 THEN
		RETURN TRUE;
	END IF;
END //
DELIMITER ;


/**
 *	Procedure `Update_User`
 *
 *	Called with 'Edit Profile" button, updates User Info
 *		USERNAME CANNOT BE CHANGED
 */
 
DROP PROCEDURE IF EXISTS `Update_User`;

DELIMITER //
CREATE PROCEDURE `Update_User`(IN UName VARCHAR(70), IN newEmail VARCHAR(70), IN newFamilyName VARCHAR(70))
BEGIN
	UPDATE `USER` SET `Email` = newEmail WHERE `Username` = UName;
    UPDATE `USER_FAMILY` SET `Family_Name` = newFamilyName WHERE `USER_ID` = (SELECT ID FROM `USER` WHERE `Username` = UName);
END //
DELIMITER ;

/**
 *	Procedure `Change_Password`
 *
 *	Called with 'Change Password' button, updates `User` Table
 *	
 *	Front end should validate old password before allowing change
 */
 
DROP PROCEDURE IF EXISTS `Change_Password`;

DELIMITER //
CREATE PROCEDURE `Change_Password`(IN UName VARCHAR(70), IN newPwd BLOB)
BEGIN
	UPDATE `USER` SET `Password` = newPwd WHERE `Username` = UName;
END //
DELIMITER ;

/**
 *	Procedure `Get_UserInfo`
 */
 
DROP PROCEDURE IF EXISTS `Get_UserInfo`;

DELIMITER //
CREATE PROCEDURE `Get_UserInfo`(IN UName VARCHAR(70))
BEGIN
	SELECT `USER`.`Username`, `USER`.Email, `USER_FAMILY`.`Family_Name`, `USER`.Last_Active, `USER`.Join_Date, `USER`.numPosts FROM `USER`
    LEFT JOIN (`USER_FAMILY`) ON `USER`.ID = `USER_FAMILY`.USER_ID
    WHERE `USER`.`Username`=UName;
END //
DELIMITER ;

/**
 *	Procedure `Update_Activity`
 */
 
DROP PROCEDURE IF EXISTS `Update_Activity`;

DELIMITER //
CREATE PROCEDURE `Update_Activity`(IN UName VARCHAR(70))
BEGIN
	UPDATE `USER` SET `Last_Active` = NOW() WHERE `Username` = UName;
END //
DELIMITER ;

/**
 *	Procedure `Add_Character`
 */
 
DROP PROCEDURE IF EXISTS `Add_Character`;

DELIMITER //
CREATE PROCEDURE `Add_Character`(IN UName VARCHAR(70), IN CName VARCHAR(45), IN Ctitle VARCHAR(45), IN CClass VARCHAR(50), IN Lvl INT, IN CHP INT, IN RSC INT)
BEGIN
	DECLARE UserID, FamilyID, CharID INT;
    SET UserID = (SELECT ID FROM USER WHERE `Username` = UName);
    SET FamilyID = (SELECT ID FROM USER_FAMILY WHERE USER_ID = UserID);
    
    INSERT INTO `CHARACTERS`(USER_ID, FAMILY_ID, `Name`, Title, Class, `Level`) VALUES (UserID, FamilyID, CName, Ctitle, CClass, Lvl);
    SET CharID = (SELECT ID FROM `CHARACTERS` WHERE USER_ID = UserID AND FAMILY_ID = FamilyID AND `Name` = CName);
    INSERT INTO `CHARACTER_STATS`(CHARACTERS_ID, HP, Resource) VALUES (CharID, CHP, RSC);
    
    UPDATE `USER` SET `numCharacters` = (`numCharacters` + 1) WHERE Username = UName;
END //
DELIMITER ;

/**
 *	Procedure `Get_CharacterInfo`
 */

DROP PROCEDURE IF EXISTS `Get_CharacterInfo`;

DELIMITER //
CREATE PROCEDURE `Get_CharacterInfo`(/*IN UName VARCHAR(70),*/ IN CName VARCHAR(45))
BEGIN
	DECLARE UserID, CharID INT;
    #SET UserID = (SELECT ID FROM USER WHERE `Username` = UName);
    SET CharID = (SELECT ID FROM `CHARACTERS` WHERE `Name` = CName);
    
    SELECT `CHARACTERS`.`Name`, `CHARACTERS`.Title, `CHARACTERS`.Class, `CHARACTERS`.`Level`, `CHARACTER_STATS`.HP, `CHARACTER_STATS`.Resource FROM `CHARACTERS`
    LEFT JOIN (`CHARACTER_STATS`) ON `CHARACTERS`.ID = `CHARACTER_STATS`.CHARACTERS_ID
    WHERE `CHARACTERS`.ID = CharID;
END //
DELIMITER ;

/**
 *	Procedure `Get_Roster`
 */

DROP PROCEDURE IF EXISTS `Get_Roster`;

DELIMITER //
CREATE PROCEDURE `Get_Roster`()
BEGIN
	SELECT `USER`.ID, `GUILD_MEMBERS`.Rank, `CHARACTERS`.`Name`, `CHARACTERS`.Class, `CHARACTERS`.`Level` FROM `USER`
    LEFT JOIN(`GUILD_MEMBERS`) ON `USER`.ID = `GUILD_MEMBERS`.USER_ID
    RIGHT JOIN(`CHARACTERS`) ON `USER`.ID = `CHARACTERS`.USER_ID
    ORDER BY Rank, `Level` DESC;
END //
DELIMITER ;


