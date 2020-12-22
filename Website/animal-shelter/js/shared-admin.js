var backdrop = document.querySelector(".backdrop");
var toggleButton = document.querySelector(".a-toggle-button");
var slider = document.querySelector(".slider-nav");
var closeBtn = document.querySelector(".s-close-button");

var usersBtn = document.querySelector("#users-main-nav_btn")
var userWrapper = document.querySelector(".slider-nav_item_sub_wrapper");

var animalsBtn = document.querySelector("#animals-main-nav_btn");
var animalsWrapper = document.querySelector(".slider-nav_item_sub_wrapper_animals");

backdrop.addEventListener("click", function() {
    slider.classList.remove("open");
  closeModal();
});

closeBtn.addEventListener("click", function(){
    slider.classList.remove("open");
    closeModal();
});

function closeModal() {
  backdrop.classList.remove("open");
}

toggleButton.addEventListener("click", function() {
    slider.classList.add("open");
  backdrop.classList.add("open");
});

animalsBtn.addEventListener("click", function(){
    if(animalsWrapper.classList.contains("show")){
        animalsWrapper.classList.remove("show");
    }
    else{
        animalsWrapper.classList.add("show");
    }
})

usersBtn.addEventListener("click", function() {
    if(userWrapper.classList.contains("show")){
        userWrapper.classList.remove("show");
    }
    else{
        userWrapper.classList.add("show");
    }
});