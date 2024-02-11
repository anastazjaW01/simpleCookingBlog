document.addEventListener("DOMContentLoaded",function(){
    //Get all elements with class star and input type="radio"
    const stars = document.querySelectorAll('.star input[type="radio"]');

    stars.forEach(function(star){
        star.addEventListener('click',function(){
            
            // Check the input associated with the clicked li
            this.checked = true;

            //Remove selected class from all stars
            const allStars = document.querySelectorAll('.star');
            allStars.forEach(function(s){
                s.classList.remove('selected');
            });

            //Add selected class to chose star and previous stars
            let currentStar= this.closest('.star');
            while(currentStar){
                currentStar.classList.add('selected');
                currentStar = currentStar.nextElementSibling;
            }
        });
    });
});


