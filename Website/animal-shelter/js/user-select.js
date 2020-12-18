function SelectIdFromUserList(){
    let elements = document.querySelectorAll('.user-container-btn');
    let idInput = document.querySelector('#input_selected_id');
    // console.log(elements);
    Array.from(elements).forEach(user => {
        user.addEventListener('click', function() {
            Array.from(elements).forEach(user_ =>{
                if(user_.classList.contains('user_selected')){
                    user_.classList.remove('user_selected');
                }
            });
            user.classList.add('user_selected');
            var userId = user.id.substring(5);
            idInput.value = userId;
            //console.log(animalId);
        });
    });
}