function UpdateControls(){
    let page = $("#input_animal_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/animal-getCount-ajax.php",
        data: {
            request_type: "all",
        },
        dataType: "JSON",
        success: function (response) {
            let animalCount = JSON.parse(response);
            if(animalCount > 0){
                let totalPages = Math.ceil(response/5);
                if(page > 1){
                    $(".animal-overview-list-controls").append("<div class=\"a-first-page-btn\" title='Go to the first page.'><<</div>");
                    $(".a-first-page-btn").show("fade", 500);
                    $(".a-first-page-btn").click(function (e) { 
                        $("#input_animal_page").val(1);
                        AjaxShowAllAnimals() 
                    });

                    let previousPage = parseInt($("#input_animal_page").val(), 10) - 1;
                    $(".animal-overview-list-controls").append("<div class=\"a-previous-page-btn\" title='Previous page is "+previousPage+".'><</div>");
                    $(".a-previous-page-btn").show("fade", 500);
                    $(".a-previous-page-btn").click(function (e) {
                        $("#input_animal_page").val(previousPage);
                        AjaxShowAllAnimals()
                    });
                }
                if(page < totalPages){
                    let nextPage = parseInt($("#input_animal_page").val(), 10) + 1;
                    $(".animal-overview-list-controls").append("<div class=\"a-next-page-btn push\" title='Next page is "+nextPage+".'>></div>");
                    $(".a-next-page-btn").show("fade", 500);
                    $(".a-next-page-btn").click(function (e) {
                        $("#input_animal_page").val(nextPage);
                        AjaxShowAllAnimals() 
                    });

                    $(".animal-overview-list-controls").append("<div class=\"a-last-page-btn\" title='Last page is "+totalPages+".'>>></div>");
                    $(".a-last-page-btn").show("fade", 500);
                    $(".a-last-page-btn").click(function (e) {
                        $("#input_animal_page").val(totalPages);
                        AjaxShowAllAnimals()
                    });

                }
            }
        }
    });
}

function AjaxShowAllAnimals(){
    let page = $("#input_animal_page").val();
    $.ajax({
        type: "post",
        url: "../handlers/animal-show-all-ajax.php",
        data: {
            animal_page: page,
            animal_display: "overview"
        },
        dataType: "html",
        beforeSend: function(){
        $("#animal_overview_list").html("");
        $("#animal_overview_list").html("<div class=\"loader-wrap\"><div class=\"loading-container\"><i class=\"fas fa-paw\"></i><div class=\"loader-text\">LOADING ANIMALS</div></div></div>");
        },
        success: function (data) {
        $("#animal_overview_list").html("");
        $("#animal_overview_list").html(data);
        SelectIdFromAnimalList();
        $(".animal-overview-list-controls").html("");
        UpdateControls();
        }
    });
}

$(document).ready(function () {
    AjaxShowAllAnimals();
});