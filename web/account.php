<!DOCTYPE html> 

<html> 
 	<head> 
        <meta charset = "utf-8"> 
        <title>Account</title> 
        <link rel="stylesheet" type="text/css" href="resources/css/headers.css"> 
 	</head> 
 
 	<body> 
        <div class="container">
            <div class="wrapper">
                
                <!-- Include Status display message -->
                <div class="status">
                    <?php include "statusbar.php"; ?>
                </div>
                
                <!-- Website banner image -->
                <div class="banners"></div> 
                
                <!-- Navigation Bar -->
                <div class="NavBar">
                    <!-- Include Navigation Bar -->
                    <?php include 'navbar.html'; ?>
                </div>

                <div class="fuckTabitha">
                    <h3><center>Account Page</center></h3>
                    <!-- User Account Table -->
                    <div class="userTable">
                    <table>
                        <tr>
                            <td rowspan="3" colspan="3">
                                <img src="resources/images/tinyWhale.png" width="225" height="151" alt="Photo of Milford Sound in New Zealand" align="left"/>
                            </td>        
                            <td>Username:</td> 
                            <!-- PHP for populating row -->
                            <td></td> 
                        </tr>
                        <tr>
                            <td>Email:</td> 
                            <!-- PHP for populating row -->
                            <td colspan="1"> </td> 
                        </tr>
                        <tr>
                            <td>Family:</td> 
                            <!-- PHP for populating Row -->
                            <td colspan="1"> </td> 
                        </tr>
                        <tr>
                            <td rowspan="3" colspan="3"></td>
                            <td colspan="1">Join Date:</td>
                            <!-- PHP for updating row -->
                            <td colspan="1"></td>
                        </tr>
                        <tr>
                            <td colspan="1">Last Active:</td> 
                            <!-- PHP for updating row -->
                            <td colspan="1"></td> 
                        </tr>
                        <tr>   
                            <td colspan="1">Number of Posts:</td> 
                            <!-- PHP for updating row -->
                            <td colspan="1"></td> 
                        </tr>
                    </table>
                    </div>
                    <!-- Change Password Button -->
             		<p> 
             		   <a href="ChangePassword.php">
             		   <button>Change Password</button></a>
             		</p>
                    <!-- Edit Profile Button -->
            		<p> 
                        <input type = "submit" value = "Edit Profile"> 
                    </p>  
                    <!-- Create Character Button -->
                    <p> 
                        <a href="CreateCharacter.html">
                        <button>Create Character</button></a>
                    </p>   
                </div>
            </div> 
        </div>
    </body> 
</html> 
