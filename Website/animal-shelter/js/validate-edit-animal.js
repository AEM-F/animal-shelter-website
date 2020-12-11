function ValidateAnimalEditInfo(){
    
//image validation
    if($("#input_edit_link_animal").val().length < 1 || $("#input_edit_link_animal").val() =="" || $("#input_edit_link_animal").val().length > 200){
        $("#error_animal_edit_image").show("fade", 800);
        $("#error_animal_edit_image").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid link");
        $('#error_animal_edit_image').delay(3000).hide("fade", 5000);
        return false;
    }
    
//name validation
    else if($("#input_animal_edit_name").val().length < 1 || $("#input_animal_edit_name").val() =="" || $("#input_animal_edit_name").val().length > 50){
        $("#error_animal_edit_name").show("fade", 800);
        $("#error_animal_edit_name").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid name");
        $('#error_animal_edit_name').delay(3000).hide("fade", 5000);
        return false;
    }
//breed validation

    else if(($("#input_animal_edit_breed").val().length < 1 || $("#input_animal_edit_breed").val() =="" || $("#input_animal_edit_breed").val().length > 50) && (document.getElementById('rb_animal_type_dog').checked || document.getElementById('rb_animal_type_cat').checked)){
        $("#error_animal_edit_Breed").show("fade", 800);
        $("#error_animal_edit_Breed").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid breed");
        $('#error_animal_edit_Breed').delay(3000).hide("fade", 5000);
        return false;
    }
//species validation
    else if(($("#input_animal_edit_species").val().length < 1 || $("#input_animal_edit_species").val() =="" || $("#input_animal_edit_species").val().length > 50) && document.getElementById('rb_animal_type_bird').checked){
        $("#error_animal_edit_species").show("fade", 800);
        $("#error_animal_edit_species").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid species");
        $('#error_animal_edit_species').delay(3000).hide("fade", 5000);
        return false;
    }
//description validation
else if($("#input_animal_edit_description").val().length < 1 || $("#input_animal_edit_description").val() =="" || $("#input_animal_edit_description").val().length > 600 ){
    $("#error_animal_edit_description").show("fade", 800);
    $("#error_animal_edit_description").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid description");
    $('#error_animal_edit_description').delay(3000).hide("fade", 5000);
    return false;
}
//age validation
else if($("#input_animal_edit_age").val().length < 1 || $("#input_animal_edit_age").val() =="" || $("#input_animal_edit_age").val().length > 3 ){
    $("#error_animal_edit_age").show("fade", 800);
    $("#error_animal_edit_age").html("<i class=\"fas fa-exclamation-triangle\"></i> Invalid age");
    $('#error_animal_edit_age').delay(3000).hide("fade", 5000);
    return false;
}
    else{
        return true;
    }

}
$('#animal_edit_form').on('submit', function(e){
    e.preventDefault();
  });

$("#btn_animal_form_submit").click(function (e) { 
    $('#animal_edit_form').unbind('submit'); 
    let success = ValidateAnimalEditInfo();
    if(success)
    $( "#animal_edit_form" )[0].submit(); 
    //document.getElementById("animal_edit_form").submit(); 
    
});