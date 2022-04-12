<?php
    INCLUDE("security.php");
?>
<html>
  <head>
    <title>Lab</title>
  </head>
  <body>
    <form method="POST" action="logout.php"> 
        Please enter a username and password to log out of our web site.<br /><br />
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" >  
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" >  
        </div>
        <input type="submit" value="Logout">
    </form>
    <?php
        if(security_validate())
        {
            // Ensure the user has entered a username before continuing.
            if(strlen($_POST['username']) == 0)
            {
                echo "Please enter a username.";
                return;
            }
            
            // Ensure the user has entered a password before continuing.
            if(strlen($_POST['password']) == 0)
            {
                echo "Please enter a password.";
                return;
            }
            
            // Check to see if the user is not already logged in 
            // first before we try to log them into the database.
            if(security_loggedIn()) 
            {
                security_logout();
                echo "User logged out.";
            }
            else
            {
                echo "User is already logged out.";
                return;
            }

            if(!security_loggedIn()) 
            {
                echo "User is logged out.";
            }
            else
            {
                echo "User is still logged in.";
            }
        }
    ?>
  </body>
</html>