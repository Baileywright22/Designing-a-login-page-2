<?php
    INCLUDE("security.php");
?>
<html>
  <head>
    <title>Lab</title>
  </head>
  <body>
    <form method="POST"  action="signup.php">
        Please enter a username and password to remove the user from our web site.<br /><br />
        <div>
            <label for="username">Username</label>
            <input name="username" type="text">  
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" >  
        </div>
        <input type="submit" value="Sign up">
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

        // Add the new user to the database.
        security_deleteNewUser();
      }
    ?>
  </body>
</html>