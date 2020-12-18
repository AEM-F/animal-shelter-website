function closeModalForPopup(){
   // $(".backdrop").hide("fade", 300);
    $(".user-remove-popup-container").hide("fade", 300);
    $(".user-remove-popup-container").html("");
}

$("#user-remove-btn").click(function (e) { 
    let userId = $("#input_selected_id").val();
    if(userId != 0 && userId > 0){
        $('.user-overview-form').unbind('submit'); 
        $.ajax({
            type: "post",
            url: "../handlers/user-match-id-ajax.php",
            data: {
                user_id: userId
            },
            dataType: "text",
            success: function (response) {
                switch(response) {
                    case "loggedUser":
                        //$(".backdrop").show("fade", 300);
                        $(".user-remove-popup-container").append("<div class=\"user-remove-popup-wrapper\"><p class=\"user-remove-popup-header\"><i class=\"fas fa-exclamation-triangle\"></i>Warning</p><p class=\"user-remove-popup-text\">The following action will permantly remove your account from the system.You will be redirected to the home page. Are you sure you want to proceed?</p><div class=\"user-remove-popup-controls\"><div class=\"user-remove-popup-cancel-btn\">Cancel</div><div class=\"user-remove-popup-submit-btn\">Submit</div></div></div>");
                        $(".user-remove-popup-container").show("fade", 300);
                        $(".user-remove-popup-cancel-btn").click(function (e) { 
                            closeModalForPopup();
                        });
                        $(".user-remove-popup-submit-btn").click(function (e) { 
                            closeModalForPopup();
                            $.ajax({
                                type: "post",
                                url: "../handlers/user-overview-handler.php",
                                data: {
                                    user_remove_btn: "clicked",
                                    input_user_id: userId
                                },
                                complete: function (response) {
                                    window.location.replace('../index.php');
                                }
                            });
                        });
                    break;
                    case "adminUser":
                        //$(".backdrop").show("fade", 300);
                        $(".user-remove-popup-container").append("<div class=\"user-remove-popup-wrapper\"><p class=\"user-remove-popup-header\"><i class=\"fas fa-exclamation-triangle\"></i>Warning</p><p class=\"user-remove-popup-text\">The following action will permantly remove an admin account.Are you sure you want to proceed?</p><div class=\"user-remove-popup-controls\"><div class=\"user-remove-popup-cancel-btn\">Cancel</div><div class=\"user-remove-popup-submit-btn\">Submit</div></div></div>");
                        $(".user-remove-popup-container").show("fade", 300);
                        $(".user-remove-popup-cancel-btn").click(function (e) { 
                            closeModalForPopup();
                        });
                        $(".user-remove-popup-submit-btn").click(function (e) { 
                            closeModalForPopup();
                            $.ajax({
                                type: "post",
                                url: "../handlers/user-overview-handler.php",
                                data: {
                                    user_remove_btn: "clicked",
                                    input_user_id: userId
                                },
                                complete: function (response) {
                                    AjaxShowAllUsers();
                                }
                            });
                        });
                    break;
                    case "normalUser":
                        $( ".user-overview-form" )[0].submit();
                    break;
                  } 
            }
        });
    }
});