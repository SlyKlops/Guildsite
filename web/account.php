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
                
                <!-- Display Error Message if Anonymous User accidentally gets to page -->
                <?php 
                    if($_SESSION['active_user']==FALSE){
                        session_start();
                        $_SESSION['errormsg']='You are not logged in!';
                        header('Location: errorpage.php');
                    }
                ?>

                <!-- Website banner image -->
                <div class="banners"></div> 
                
                <!-- Navigation Bar -->
                <div class="NavBar">
                    <!-- Include Navigation Bar -->
                    <?php include 'navbar.php'; ?>
                </div>

                <div class="Content">
                    <h3><center>Account Page</center></h3>
                    <!-- User Account Table -->
                    <div class="userTable">
                    <table>
                        <tr>
                            <td rowspan="3" colspan="3">
                                <img src="resources/images/tinyWhale.png" width="225" height="151" alt="Photo of Milford Sound in New Zealand" align="left"/>
                            </td>      
                            <?php
                                $uname = $_SESSION['username'];
                                //Construct Query
                                $query = "CALL `Get_UserInfo`('$uname')";
                                //Connect to DB
                                if(!($database = mysql_connect("localhost", "root", "myserver95")))
                                    die("Could not connect to database");
                                //Open slsite Database
                                if(!mysql_select_db("slsite", $database))
                                    die( "<p>Could not open slsite database</p>");
                                //Execute query
                                if(!($result = mysql_query($query, $database)))
                                {
                                    print("<p>Could not execute query!</p>");
                                    die( mysql_error());
                                }
                                $res=mysql_fetch_row($result);

                                $_SESSION['uemail'] = $res[1];
                                $_SESSION['ufamily'] = $res[2];
                                $_SESSION['ulastact'] = $res[3];
                                $_SESSION['ujoin'] = $res[4];
                                $_SESSION['uposts'] = $res[5];

                                mysql_free_result($result);
                                mysql_close($database);
                            ?>  
                            <td>Username:</td> 
                            <!-- PHP for populating row -->
                            <td>
                                <?php echo $_SESSION['username']; ?>
                            </td> 
                        </tr>
                        <tr>
                            <td>Email:</td> 
                            <!-- PHP for populating row -->
                            <td colspan="1">
                                <?php echo $_SESSION['uemail']; ?>
                            </td> 
                        </tr>
                        <tr>
                            <td>Family:</td> 
                            <!-- PHP for populating Row -->
                            <td colspan="1"> 
                                <?php echo $_SESSION['ufamily']; ?>
                            </td> 
                        </tr>
                        <tr>
                            <td rowspan="3" colspan="3"></td>
                            <td colspan="1">Join Date:</td>
                            <!-- PHP for updating row -->
                            <td colspan="1">
                                <?php echo $_SESSION['ujoin']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">Last Active:</td> 
                            <!-- PHP for updating row -->
                            <td colspan="1">
                                <?php echo $_SESSION['ulastact']; ?>
                            </td> 
                        </tr>
                        <tr>   
                            <td colspan="1">Number of Posts:</td> 
                            <!-- PHP for updating row -->
                            <td colspan="1">
                                <?php echo $_SESSION['uposts']; ?>
                            </td> 
                        </tr>
                    </table>
                    </div>
                    <!-- Change Password Button -->
             		<p> 
             		   <a href="ChangePassword.php">
             		   <button class="NavButton">Change Password</button></a>
                    <!-- Edit Profile Button -->
                        <button class="NavButton" disabled>Edit Profile</button>
                    <!-- Create Character Button -->
                        <a href="CreateCharacter.php">
                        <button class="NavButton">Create Character</button></a>
                    </p>   
                </div>
            </div> 
        </div>
    </body> 
</html> 
