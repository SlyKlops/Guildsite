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
	INSERT INTO `USER`(Username, Email, `Password`) VALUES (UName, UEmail, UPwd);
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
 
DROP FUNCTION IF EXISTS `Validate_Email`;

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