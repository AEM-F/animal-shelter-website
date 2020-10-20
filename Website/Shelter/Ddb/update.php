<?php
session_start();

$email = $_SESSION['Email'];

include_once("config.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Details for <?php echo $Email; ?></title>
        <link rel="stylesheet" href="../Css/logIn.css">
    </head>

    <body>
        <form action="process.php" method="post"></form>
    <div class="container">
    <label for="Name"><b>Name</b></label>
      <input type="text" placeholder="Enter name" class="UserStyle Input-field" name="FirstName" required>

      <label for="LastName"><b>Last name</b></label>
      <input type="text" placeholder="Enter LastName" class="UserStyle Input-field" name="LastName" required>

      <label for="Email"><b>Email</b></label>
      <input type="text" placeholder="Enter email address" class="Input-field" name="Email" required>

      <label for="Password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Password" class="Input-field" required>

      <label for="PasswordRpt"><b>Password confirm</b></label>
      <input type="password" placeholder="Enter Password again" name="PasswordRpt" class="Input-field" required>


      <button type="submit" name ="UpdateUser" class = "signUpButtSes" >Update</button>
    </div>
    </body>
</html>