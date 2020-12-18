function ValidateUserEditInfo(){
    
    var error_user_name= document.getElementById('error_user_edit_name');
    var error_user_lastName= document.getElementById('error_user_edit_lastName');
    var error_user_password= document.getElementById('error_user_edit_password');
    var error_user_cpassword= document.getElementById('error_user_edit_cpassword');
    var error_user_email= document.getElementById('error_user_edit_email');

    var user_name=document.getElementById('user_edit_name');
    var user_password=document.getElementById('user_edit_password');
    var user_cpassword=document.getElementById('user_edit_cpassword');
    var user_email=document.getElementById('user_edit_email');
    var user_lastName=document.getElementById('user_edit_lastName');
//name validation
    if(user_name.value.length < 1 || user_name.value ==""){
        error_user_name.style.display= "block";
        error_user_name.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Name can not be empty";
        $("#error_user_edit_name").hide("fade", 8000);
        return false;
    }
    else if(user_name.value.length > 50 ){
        error_user_name.style.display= "block";
        error_user_name.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Name text limit reached(50)";
        $("#error_user_edit_name").hide("fade", 8000);
        return false;
    }
//password validation
    else if(user_password.value.length < 1 || user_password.value ==""){
        error_user_password.style.display= "block";
        error_user_password.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Password can not be empty";
        $("#error_user_edit_password").hide("fade", 8000);
        return false;
    }
    else if(user_password.value.length > 50){
        error_user_password.style.display= "block";
        error_user_password.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Password text limit reached(50)";
        $("#error_user_edit_password").hide("fade", 8000);
        return false;
    }

    else if(user_cpassword.value.length < 1 || user_cpassword.value ==""){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Password can not be empty";
        $("#error_user_edit_cpassword").hide("fade", 8000);
        return false;
    }
    else if(user_cpassword.value.length > 50){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Password text limit reached(50)";
        $("#error_user_edit_cpassword").hide("fade", 8000);
        return false;
    }

    else if(user_password.value != user_cpassword.value && user_password.value == "" && user_cpassword.value ==""){
        error_user_cpassword.style.display= "block";
        error_user_cpassword.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Passwords do not match";
        $("#error_user_edit_cpassword").hide("fade", 8000);
        return false;
    }
//lastName validation
    else if(user_lastName.value.length < 1 || user_password.value ==""){
        error_user_lastName.style.display= "block";
        error_user_lastName.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Last Name can not be empty";
        $("#error_user_edit_lastName").hide("fade", 8000);
        return false;
    }
    else if(user_lastName.value.length > 50){
        error_user_lastName.style.display= "block";
        error_user_lastName.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Last Name text limit reached(50)";
        $("#error_user_edit_lastName").hide("fade", 8000);
        return false;
    }
//email validation
    else if(!user_email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Enter a valid email adress";
        $("#error_user_edit_email").hide("fade", 8000);
        return false;
    }
    else if(user_email.value.length < 1 || user_password.value ==""){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Email can not be empty";
        $("#error_user_edit_email").hide("fade", 8000);
        return false;
    }
    else if(user_email.value.length > 50){
        error_user_email.style.display= "block";
        error_user_email.innerHTML="<i class=\"fas fa-exclamation-triangle\"></i> Email text limit reached(50)";
        $("#error_user_edit_email").hide("fade", 8000);
        return false;
    }
    else{
        return true;
    }

}

