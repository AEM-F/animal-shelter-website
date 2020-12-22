$("#backdrop").click(function (e) { 
    e.preventDefault();
    
});
var slider = document.querySelector(".donation-button-style");
      var purchaseWindow = document.getElementById("donation-purchase-alert");
      var overlayBox = document.getElementById("user-donation-overlay-box");

// $(document).ready(function() {
//     $("#demo").html("Your gift today helps save lives Your contribution to Hope For Paws goes straight to work helping us save animals - by supporting our rescue operations and helping us provide medical care. On June 11th, were celebrating our 12th anniversary and would love for you to join us with a $12.12 membership.");
//     $("#demo").show("fade",5000);
//     //  With a donation you will be able notified with invoice of what was purchased with the money you provided.

//     // all custom jQuery will go here
// });

slider.addEventListener("click", function() {
    $( ".overlay" ).toggle( "fold", 1000 );
    slider.classList.add("open");
  slider.classList.add("open");
});

function myFunction() {
    
    var x = document.getElementById("backdrop");
  
    // Add the "show" class to DIV
    x.className = "show";
    // alert("Shit got clicked");
    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  } ;
  function displayPurchase() {
    //   $("#donation-purchase-alert").className("display","block");
      
      purchaseWindow.style.display = "block";
      overlayBox.style.display = "none";
      purchaseWindow.show("fade",1000);
      overlayBox.hide("fade",1000);
      

      
      
    //   alertWindow.style.style = "fixed";
   // setTimeout(function(){alertWindow = alertWindow.replace.})
  };
  function on() {
    $("#backdrop").show("fade",1000);
      document.getElementById("backdrop").style.display = "block";
      overlayBox.style.display = "block";
      purchaseWindow.style.display = "none";
    //  document.getElementById("backdrop").style.position = "initial"
  };
  function off() {
    
    //var alertWindow = document.getElementById("donation-purchase-alert");
    $("#backdrop").hide("fade",1000);
    document.getElementById("backdrop").style.display = "none";
    document.getElementById("backdrop").style.position = "fixed";

    

      alertWindow.hide("fade",1000);
      alertWindow.style.display = "none";
      purchaseWindow.style.display = "block";
      purchaseWindow.style.display = "none";

} 

  function complete(){
    $("#backdrop").hide("fade",1000);
    document.getElementById("backdrop").style.display = "none";
    document.getElementById("backdrop").style.position = "fixed";
    alertWindow
    alert("Thank you for the donation");
    }

