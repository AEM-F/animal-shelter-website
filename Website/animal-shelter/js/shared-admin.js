//vanilla js version
 var backdrop = document.querySelector(".backdrop");
 var toggleButton = document.querySelector(".a-toggle-button");
 //var slider = document.querySelector(".slider-nav");
 var closeBtn = document.querySelector(".s-close-button");

 var usersBtn = document.querySelector("#users-main-nav_btn")
// var userWrapper = document.querySelector(".slider-nav_item_sub_wrapper");

 var animalsBtn = document.querySelector("#animals-main-nav_btn");
// var animalsWrapper = document.querySelector(".slider-nav_item_sub_wrapper_animals");

backdrop.addEventListener("click", function() {
    //vanilla js version
    // slider.classList.remove("open");
    closeModal();
});

closeBtn.addEventListener("click", function(){
    //vanilla js version
    //slider.classList.remove("open");
    closeModal();
});

function closeModal() {
    $(".slider-nav").hide("slide", 300);
    $(".backdrop").hide("fade", 300);
    //backdrop.classList.remove("open");
}

toggleButton.addEventListener("click", function() {
    $(".backdrop").show("fade", 300);
    $(".slider-nav").delay(300).show("slide", 300);
    //vanilla js version
    //slider.classList.add("open");
  //backdrop.classList.add("open");
   
});

animalsBtn.addEventListener("click", function(){
    $(".slider-nav_item_sub_wrapper_animals").toggle("slide",{direction: "up"},300 );
    //vanilla js version
    // if(animalsWrapper.classList.contains("show")){
    //     animalsWrapper.classList.remove("show");
    // }
    // else{
    //     animalsWrapper.classList.add("show");
    // }
})

usersBtn.addEventListener("click", function() {
    $(".slider-nav_item_sub_wrapper").toggle("slide",{direction: "up"},300 );
    //vanilla js version
    // if(userWrapper.classList.contains("show")){
    //     userWrapper.classList.remove("show");
    // }
    // else{
    //     userWrapper.classList.add("show");
    // }
});