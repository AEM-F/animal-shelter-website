<?php 
//include "classes/config.class.php";
$userid= "";
$loginStatus=true;
//$dberror = "";
if (isset($_SESSION['register-error']) || !empty($_SESSION['register-error'])){
    $dberror = $_SESSION['register-error'];
}
?>
<html>
    <head>
        <title>Login And Registration Form - Easy Tutorials</title>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript">
        var userid = <?php echo json_encode($userid) ?>;
        var logInStatus= <?php echo json_encode($loginStatus) ?>;
        </script>
    <script src="javascript/nav.js" defer></script>
        <script src="javascript\validateuserregisterinfo.js" defer></script>
    </head>
<?php include 'includes\navbar.inc.php'; ?>
    <body>
        <div class="hero">
            <div class= "form-box">
                <div class="button-box">
                    <div id="btn"> </div>
                    <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                    <button type="button" class="toggle-btn"onclick="register()">Sign up</button>
            </div>
            <form id="login" class="input-group " action="login.script.php" method="post">
                <input type="text" class="input-field" placeholder="Username" name="username-login" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="password-login" required id="pass">
                <input type="checkbox" class="check-box"> <span class ="check-box-text"> Remember Password</span>
                <input type="checkbox" class="check-box" id="sp" onclick="ShowPassword()"> <span id="sp-text" class ="check-box-text"> Show Password</span>
                <!-- <button type="submit" class="submit-btn">Log in</button> -->
                <button type="submit" class="submit-btn" name="submit-btn-login">Log in</button>
            </form>

            <form id="register" class="input-group" method="post" name="register-form" action="includes/registerscript.inc.php" onsubmit="return ValidateRegister()">
                <input type="text" class="input-field" placeholder="Username" name="username-register">
                <div id="name_error"></div>
                <input type="email" class="input-field" placeholder="Email" name="email-register">
                <div id="email_error"></div>
                <input type="text" class="input-field" placeholder="Enter Password" name="pass-register">
                <div id="password_error"></div>
                <input type="checkbox" class="check-box"> <span class ="check-box-text"> I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn" name="submit-btn-register">Register</button>
            </form>
        </div>
    </div>

    <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
    }

    
    function ShowPassword() {
        var showpass = document.getElementById("pass");
  if (showpass.type === "password") {
    showpass.type = "text";
  } else {
    showpass.type = "password";
  }
} 
</script>





</body>
</html>