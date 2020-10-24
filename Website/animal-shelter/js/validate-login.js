function ValidateLoginInfo(){
    var error_user_password= document.getElementById('error_user_login_password');
    var error_user_email= document.getElementById('error_user_login_email');

    var user_email=document.getElementById('user_login_email');
    var user_password=document.getElementById('user_login_password');

//validate email
    if(!user_email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Enter a valid email adress";
        return false;
    }
    else if(user_email.value.length < 1 || user_email.value ==""){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Email can not be empty";
        return false;
    }
    else if(user_email.value.length > 50){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="Email text limit reached(50)";
        return false;
    }
    //validate password
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
    else {
        return true;
    }
}