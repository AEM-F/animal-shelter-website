function UpdateControls(){
    let page = $("#input_user_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/user-getCount-ajax.php",
        data: {
            request_type: "all",
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
                        AjaxShowAllUsers(); 
                    });

                    let previousPage = parseInt($("#input_user_page").val(), 10) - 1;
                    $(".user-overview-list-controls").append("<div class=\"a-previous-page-btn\" title='Previous page is "+previousPage+".'><</div>");
                    $(".a-previous-page-btn").show("fade", 500);
                    $(".a-previous-page-btn").click(function (e) {
                        $("#input_user_page").val(previousPage);
                        AjaxShowAllUsers();
                    });
                }
                if(page < totalPages){
                    let nextPage = parseInt($("#input_user_page").val(), 10) + 1;
                    $(".user-overview-list-controls").append("<div class=\"a-next-page-btn push\" title='Next page is "+nextPage+".'>></div>");
                    $(".a-next-page-btn").show("fade", 500);
                    $(".a-next-page-btn").click(function (e) {
                        $("#input_user_page").val(nextPage);
                        AjaxShowAllUsers();
                    });

                    $(".user-overview-list-controls").append("<div class=\"a-last-page-btn\" title='Last page is "+totalPages+".'>>></div>");
                    $(".a-last-page-btn").show("fade", 500);
                    $(".a-last-page-btn").click(function (e) {
                        $("#input_user_page").val(totalPages);
                        AjaxShowAllUsers();
                    });

                }
            }
        }
    });
}

function AjaxShowAllUsers(){
    let page = $("#input_user_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/user-show-all-ajax.php",
        data: {
            user_page: page,
            user_display: "overview"
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
        $(".user-overview-list-controls").html("");
        UpdateControls();
        }
    });
}

$(document).ready(function () {
    AjaxShowAllUsers();
});