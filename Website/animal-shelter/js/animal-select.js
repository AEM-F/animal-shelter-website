let elements = document.querySelectorAll('.animal-container-btn');
let idInput = document.querySelector('#input_selected_id');
// console.log(elements);
Array.from(elements).forEach(animal => {
    animal.addEventListener('click', function() {
        Array.from(elements).forEach(animal_ =>{
            if(animal_.classList.contains('animal_selected')){
                animal_.classList.remove('animal_selected');
            }
        });
        animal.classList.add('animal_selected');
        var animalId = animal.id.substring(7);
        idInput.value = animalId;
        //console.log(animalId);
    });
});
