let lastAnimalType = "";
function UpdateFilteredControls(){
    let page = $("#input_animal_page").val();
    $.ajax({
        type: "post",
        url: "handlers/animal-getCount-ajax.php",
        data: {
            request_type: lastAnimalType,
        },
        dataType: "JSON",
        success: function (response) {
            let animalCount = JSON.parse(response);
            if(animalCount > 0){
                let totalPages = Math.ceil(response/10);
                if(page > 1){
                    $(".nav-gallery-btns").append("<div class=\"first-page-btn\" title='Go to the first page.'><<</div>");
                    $(".first-page-btn").show("fade", 500);
                    $(".first-page-btn").click(function (e) { 
                        $("#input_animal_page").val(1);
                        AjaxShowFilteredAnimals() 
                    });

                    let previousPage = parseInt($("#input_animal_page").val(), 10) - 1;
                    $(".nav-gallery-btns").append("<div class=\"previous-page-btn\" title='Previous page is "+previousPage+".'><</div>");
                    $(".previous-page-btn").show("fade", 500);
                    $(".previous-page-btn").click(function (e) {
                        $("#input_animal_page").val(previousPage);
                        AjaxShowFilteredAnimals()
                    });
                }
                if(page < totalPages){
                    let nextPage = parseInt($("#input_animal_page").val(), 10) + 1;
                    $(".nav-gallery-btns").append("<div class=\"next-page-btn push\" title='Next page is "+nextPage+".'>></div>");
                    $(".next-page-btn").show("fade", 500);
                    $(".next-page-btn").click(function (e) {
                        $("#input_animal_page").val(nextPage);
                        AjaxShowFilteredAnimals() 
                    });

                    $(".nav-gallery-btns").append("<div class=\"last-page-btn\" title='Last page is "+totalPages+".'>>></div>");
                    $(".last-page-btn").show("fade", 500);
                    $(".last-page-btn").click(function (e) {
                        $("#input_animal_page").val(totalPages);
                        AjaxShowFilteredAnimals()
                    });

                }
            }
        }
    });
}

function AjaxShowFilteredAnimals(){
    let page = $("#input_animal_page").val();
    $.ajax({
        type: "post",
        url: "handlers/animal-filter-ajax.php",
        data: {
            animal_page: page,
            animal_display: "gallery",
            animal_type : lastAnimalType
        },
        dataType: "html",
        beforeSend: function(){
        $(".pet-gallery-cards").html("");
        $(".pet-gallery-cards").html("<div class=\"loader-wrap\"><div class=\"loading-container\"><i class=\"fas fa-paw\"></i><div class=\"loader-text\">LOADING ANIMALS</div></div></div>");
        },
        success: function (data) {
        $(".nav-gallery-btns").html("");
        UpdateFilteredControls();
        $(".pet-gallery-cards").html("");
        $(".pet-gallery-cards").html(data);
        }
    });
}

$(".all-filter-btn").click(function (e) { 
    $("#input_animal_page").val(1);
    AjaxShowAllAnimals();
});

$(".dog-filter-btn").click(function (e) { 
    $("#input_animal_page").val(1);
    lastAnimalType = "Canine";
    AjaxShowFilteredAnimals();
});

$(".cat-filter-btn").click(function (e) { 
    $("#input_animal_page").val(1);
    lastAnimalType = "Feline";
    AjaxShowFilteredAnimals();
});

$(".bird-filter-btn").click(function (e) { 
    $("#input_animal_page").val(1);
    lastAnimalType = "Avian";
    AjaxShowFilteredAnimals();
});