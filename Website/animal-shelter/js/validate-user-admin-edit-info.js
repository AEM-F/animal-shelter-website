
function ValidateUserEditInfo(){
    var user_email=document.getElementById('input_user_edit_email');
    
    //name validation
        if($("#input_user_edit_name").val().length < 1 || $("#input_user_edit_name").val() =="" || $("#input_user_edit_name").val().length > 50){
            $("#error_user_edit_name").show("fade", 800);
            $("#error_user_edit_name").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid First Name");
            $('#error_user_edit_name').delay(1000).hide("fade", 5000);
            return false;
        }
        
    //last name validation
        else if($("#input_user_edit_lastName").val().length < 1 || $("#input_user_edit_lastName").val() =="" || $("#input_user_edit_lastName").val().length > 50){
            $("#error_user_edit_lastName").show("fade", 800);
            $("#error_user_edit_lastName").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid Last name");
            $('#error_user_edit_lastName').delay(1000).hide("fade", 5000);
            return false;
        }
    //Email validation
    
        else if(($("#input_user_edit_email").val().length < 1 || $("#input_user_edit_email").val() =="" || $("#input_user_edit_email").val().length > 50)){
            
            $("#error_user_edit_email").show("fade", 800);
            $("#error_user_edit_email").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid Email");
            $('#error_user_edit_email').delay(1000).hide("fade", 5000);
            return false;
            
        }
        else if(!user_email.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
            $("#error_user_edit_email").show("fade", 800);
            $("#error_user_edit_email").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid Email");
            $('#error_user_edit_email').delay(1000).hide("fade", 5000);
            return false;
        }
    //Password validation
        else if($("#input_user_edit_password").val().length < 1 || $("#input_user_edit_password").val() =="" || $("#input_user_edit_password").val().length > 50){
            $("#error_user_edit_password").show("fade", 800);
            $("#error_user_edit_password").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid Password");
            $('#error_user_edit_password').delay(1000).hide("fade", 5000);
            return false;
        }
        else{
            return true;
        }
    
    }
    $('#adm_user_form').on('submit', function(e){
        e.preventDefault();
      });
    
    $("#btn_user_form_submit").click(function (e) { 
        $('#adm_user_form').unbind('submit'); 
        let success = ValidateUserEditInfo();
        if(success)
        $( "#adm_user_form" )[0].submit();
    });