function ValidateImgLink(){
  if($("#input_edit_link_animal").val().length < 1 || $("#input_edit_link_animal").val() =="" || $("#input_edit_link_animal").val().length > 200){
    $("#error_animal_edit_image").delay(1000).show("fade", 800);
    $("#error_animal_edit_image").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid link");
    $('#error_animal_edit_image').delay(3000).hide("fade", 4000);
    return false;
}
else{
  return true;
}
}
$("#btn-preview-image-animal").click(function () { 
    $('#animal_edit_img').hide("fade", 500, callbackImage);
    let succes = ValidateImgLink();
    if(succes)
     $("#animal_edit_img").attr("src", $("#input_edit_link_animal").val());
     
 });

 function callbackImage() {
    setTimeout(function() {
      $( "#animal_edit_img" ).removeAttr( "style" ).hide().fadeIn();
    }, 500 );
  };
