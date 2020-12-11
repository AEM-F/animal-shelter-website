 $(document).ready(function () {
    if($('#rb_animal_type_dog').is(':checked')) {
        $('#animal_edit_species_wrapper').hide("fade", 1000);
    }
    else if($('#rb_animal_type_cat').is(':checked')){
        $('#animal_edit_species_wrapper').hide("fade", 1000);
    }
    else if($('#rb_animal_type_bird').is(':checked')){
        $('#animal_edit_breed_wrapper').hide("fade", 1000);
    }
});

$("#rb_animal_type_dog").click(function(){ 

    $('#animal_edit_species_wrapper').hide("fade", 1000);
    $('#input_animal_edit_species').val("");
    $('#animal_edit_breed_wrapper').show("fade", 1000);
 });

 $("#rb_animal_type_cat").click(function(){ 
    $('#animal_edit_species_wrapper').hide("fade", 1000);
    $('#input_animal_edit_species').val("");
    $('#animal_edit_breed_wrapper').show("fade", 1000);
 });

 $("#rb_animal_type_bird").click(function(){ 
    $('#animal_edit_breed_wrapper').hide("fade", 1000);
    $('#input_animal_edit_breed').val("");
    $('#animal_edit_species_wrapper').show("fade", 1000);
 });
