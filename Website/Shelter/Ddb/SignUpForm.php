
<!DOCTYPE html>
<!-- <form action="SignUp.inc.php" method="POST"> -->
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/logIn.css">
        <!-- <div>
          <a href="../Shelter/index.html" class="returnPic" > Go back </a>
        </div> -->
        
    <!-- <nav class="mobile-nav">
        <ul class="mobile-nav_items">
            <li class="mobile-nav_item">
                <a href="gallery.php">Gallery</a>
            </li>
            <li class="mobile-nav_item">
                <a href="#">About us</a>
            </li>
            <li class="mobile-nav_item">
                <a href="#">Blog</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="#">Donate</a>
            </li>
            <li class="mobile-nav_item mobile-nav_item--cta">
                <a href="#">Log In</a>
            </li>
        </ul>
    </nav>
         -->
</head>

<body>

    <!-- <form action="SignUpInc.php" method="POST" id="register" class = "input-group-SignUp">
      <div class ="registration-box">

      <label for="Username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" class="Input-field" name="Username" required>

      <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter email" class="Input-field" name="Email" required>

        <label for="Password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password" class="Input-field" required>

        <label for="FullName"><b>name and last name</b></label>
        <input type="text" placeholder="Full name" class="Input-field" name="FullName" required>
        
     
      <label class="Check-box-Accept-policy">
        <input type="checkbox" checked="checked" name="policyAccept" > Accept policy
        </label>
      
      
      
      <button type="submit" name ="loginButton" class = "loginButtonDes" >Sign up</button>
      </div>
    </form> -->
      
    <div class="container">
      
      <form  method="POST" action="process.php">
    
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

      
    
      <label class="Check-box-Accept-policy">
        <input type="checkbox" checked="checked" name="policyAccept" > Accept policy
        </label>
      

      <button type="submit" name ="signUpButton" class = "signUpButtSes" >Sign up</button>
      <label>
        
      <h5>Already a member click <a href="LogInForm.php" class ="singUpText">Here</a> </h5>
        
      </label>
      </form>
    </div>

  </body>
  
  