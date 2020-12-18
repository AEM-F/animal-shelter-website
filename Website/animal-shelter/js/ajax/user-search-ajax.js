let lastSearchedUserName = "";
function ValidateName(){
    if($("#input_search_name").val().length < 1 || $("#input_search_name").val() =="" || $("#input_search_name").val().length > 50){
        return false;
    }
    else{
        return true;
    }
}

function UpdateSearchControls(){
    let name = $("#input_search_name").val();
    let page = $("#input_user_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/user-getCount-ajax.php",
        data: {
            request_type: "search",
            user_name: lastSearchedUserName
        },
        dataType: "JSON",
        success: function (response) {
            let userCount = JSON.parse(response);
            if(userCount > 0){
                let totalPages = Math.ceil(response/5);
                if(page > 1){
                    $(".user-overview-list-controls").append("<div class=\"a-first-page-btn\" title='Go to the first page.'><<</div>");
                    $(".a-first-page-btn").show("fade", 500);
                    $(".a-first-page-btn").click(function (e) { 
                        $("#input_user_page").val(1);
                        AjaxSearchUser(); 
                    });

                    let previousPage = parseInt($("#input_user_page").val(), 10) - 1;
                    $(".user-overview-list-controls").append("<div class=\"a-previous-page-btn\" title='Previous page is "+previousPage+".'><</div>");
                    $(".a-previous-page-btn").show("fade", 500);
                    $(".a-previous-page-btn").click(function (e) {
                        $("#input_user_page").val(previousPage);
                        AjaxSearchUser(); 
                    });
                }
                if(page < totalPages){
                    let nextPage = parseInt($("#input_user_page").val(), 10) + 1;
                    $(".user-overview-list-controls").append("<div class=\"a-next-page-btn push\" title='Next page is "+nextPage+".'>></div>");
                    $(".a-next-page-btn").show("fade", 500);
                    $(".a-next-page-btn").click(function (e) {
                        $("#input_user_page").val(nextPage);
                        AjaxSearchUser(); 
                    });

                    $(".animal-overview-list-controls").append("<div class=\"a-last-page-btn\" title='Last page is "+totalPages+".'>>></div>");
                    $(".a-last-page-btn").show("fade", 500);
                    $(".a-last-page-btn").click(function (e) {
                        $("#input_user_page").val(totalPages);
                        AjaxSearchUser(); 
                    });

                }
            }
        }
    });
}

function AjaxSearchUser(){
    let page = $("#input_user_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/user-search-ajax.php",
        data: {
            user_name: lastSearchedUserName,
            user_page: page
        },
        dataType: "html",
        beforeSend: function(){
        $("#user_overview_list").html("");
        $("#user_overview_list").html("<div class=\"loader-wrap\"><div class=\"loading-container\"><i class=\"fas fa-paw\"></i><div class=\"loader-text\">LOADING USERS</div></div></div>");
        },
        success: function (data) {
        $("#user_overview_list").html("");
        $("#user_overview_list").html(data);
        SelectIdFromUserList();
        UpdateSearchControls();
        },
        complete: function (data){
        $(".user-overview-list-controls").html("");
        $(".user-overview-list-controls").html("<div class=\"user-showall-btn\">Show All</div>");
        $(".user-showall-btn").click(function (e) { 
            $("#input_user_page").val(1);
            AjaxShowAllUsers();
        });
        }
    });
}

$("#user_search_btn").click(function (e) { 
    let succes = ValidateName();
    if(succes){
        $("#input_user_page").val(1);
        let name = $("#input_search_name").val();
        lastSearchedUserName = name;
        AjaxSearchUser();
    }
    else{
        $("#error_user_search").show("fade", 800);
        $("#error_user_search").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid name");
        $('#error_user_search').delay(3000).hide("fade", 5000);
    }
    
});