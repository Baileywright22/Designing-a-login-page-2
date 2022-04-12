<?php
    INCLUDE("security.php");
?>
<html>
  <head>
    <title>Lab</title>
  </head>
  <body>
    <form method="POST"  action="signup.php">
        Please enter a username and password to sign up for our web site.<br /><br />
        <div>
            <label for="username">Username</label>
            <input name="username" type="text">  
        </div>
        <div class="password">
            <label for="password">Original Password</label>
            <input type="password" name="orgpassword" >  
        </div>
        <div>
            <label for="password">New Password</label>
            <input type="password" name="newpassword" >  
        </div>
        <input type="submit" value="Update Password">
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
        if(strlen($_POST['orgpassword']) == 0)
        {
          echo "Please enter the original password.";
          return;
        }

        if(strlen($_POST['newpassword']) == 0)
        {
          echo "Please enter the new password.";
          return;
        }

        // Add the new user to the database.
        security_updatePassword();
      }
    ?>
  </body>
</html>