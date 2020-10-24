function ValidateUserSignUpInfo(){
    
    var error_user_name= document.getElementById('error_user_signup_name');
    var error_user_lastName= document.getElementById('error_user_signup_lastName');
    var error_user_email= document.getElementById('error_user_signup_email');
    var error_user_password= document.getElementById('error_user_signup_password');
    var error_user_cpassword= document.getElementById('error_user_signup_cpassword');

    var user_name=document.getElementById('user_signup_name');
    var user_lastName=document.getElementById('user_signup_lastName');
    var user_email=document.getElementById('user_signup_email');
    var user_password=document.getElementById('user_signup_password');
    var user_cpassword=document.getElementById('user_signup_cpassword');
//name validation
    if(user_name.value.length < 1 || user_name.value ==""){
        error_user_name.style.display= "block";
        error_user_name.innerHTML="Name can not be empty";
        return false;
    }
    else if(user_name.value.length > 50 ){
        error_user_name.style.display= "block";
        error_user_name.innerHTML="Name text limit reached(50)";
        return false;
    }
//password validation
    else if(user_password.value.length < 1 || user_password.value ==""){
        error_user_password.style.display= "block";
        error_user_password.innerHTML="Password can not be empty";
        return false;
    }
    else if(user_password.value.length > 50){
        error_user_password.style.display= "block";
        error_user_password.innerHTML="Password text limit reached(50)";
        return false;
    }

    else if(user_cpassword.value.length < 1 || user_cpassword.value ==""){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="Password can not be empty";
        return false;
    }
    else if(user_cpassword.value.length > 50){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="Password text limit reached(50)";
        return false;
    }

    else if(user_password.value != user_cpassword.value){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="Passwords do not match";
        return false;
    }
//lastName validation
    else if(user_lastName.value.length < 1 || user_password.value ==""){
        error_user_lastName.style.display= "block";
        error_user_lastName.innerHTML="Last Name can not be empty";
        return false;
    }
    else if(user_lastName.value.length > 50){
        error_user_lastName.style.display= "block";
        error_user_lastName.innerHTML="Last Name text limit reached(50)";
        return false;
    }
//email validation
    else if(!user_email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Enter a valid email adress";
        return false;
    }
    else if(user_email.value.length < 1 || user_password.value ==""){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Email can not be empty";
        return false;
    }
    else if(user_email.value.length > 50){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Email text limit reached(50)";
        return false;
    }
    else{
        return true;
    }

}