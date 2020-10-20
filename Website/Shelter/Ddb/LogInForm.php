
<!DOCTYPE html>

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/logIn.css">
        

</head>

<body>

      
    <div class="container">
      <div class="imgcontainer">
        <div class="Welcome">
        <img src="../images/cuteDog.png" alt="Avatar" class="avatar">
        <h1>Hi! come here often?</h1>
        </div>
      <!-- Registration button -->
      
          <!-- <div class="button-box">
            <div id="btn"></div>
          <button type="button" class="toggle-btn" onclick="login()">Login</button>
          <button type="button" class="toggle-btn"onclick="register()">Register</button>
          </div> -->
      
      <!-- need to do register button -->
      <!-- Text for log in username/password -->
      </div>

        <form action="process.php" method="POST" id="login" class = "input-group-logIn">
          <div class=box-positioning-logIn>
      <div class ="textstuff">
        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter email" class="Input-field" name="Email" required>

        <label for="Password"><b>Password</b></label>
        <input type="password" placeholder="Enter password" name="Password" class="Input-field" required>
      </div>
      <label class="Check-box-Remember-Me">
        <input type="checkbox" checked="checked" name="remember" > Remember me
        
      </label>
      <!-- Submit -->
      <button type="submit" name ="loginButton" class = "loginButtonDes" >Login</button>
            </div>
      <h5>Not a member click <a href="SignUpForm.php" class ="singUpText">Here</a> </h5>
      
      </form>

<!-- 
      <form action="SignUpInc.php" method="POST" id="register" class = "input-group-SignUp">
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
    </div>
<script src="../js/app.js" ></script>

  </body>
  
  