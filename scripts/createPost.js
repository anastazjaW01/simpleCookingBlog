//RATING STARS

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

//INGREDIENT

function add_ingredient(){

    //add div
    var ingridient = document.createElement("div");
    ingridient.classList.add("ingredient");

    //add dot icon
    var dot = document.createElement("i");
    dot.classList.add("bi", "bi-dot");
    ingridient.appendChild(dot);

    //add input
    var input = document.createElement("input");
    input.type="text";
    ingridient.appendChild(input);

    //add x icon
    var x = document.createElement("i");
    x.classList.add("bi", "bi-x");
    x.id="remove";
    x.onclick = function (){
        removeIngredient(x);
    };
    ingridient.appendChild(x);

    //set elements
    let ingredients = document.getElementById("ingredients");
    ingredients.insertBefore(ingridient, ingredients.lastElementChild);
}

//remove ingredient 
function removeIngredient(xy){
    xy.parentNode.remove();
}

//SELECT TIME & PORTION

//function to generate time options
function selectTimeGenerate(selectTag){

    for(var i = 0.5; i <= 6; i=i+0.5){

        var option = document.createElement("option");
        option.value = i;
        option.text = i+"h";
        selectTag.appendChild(option);

    }
}

//function to generate portion options
function selectPortionGenerate(selectTag){

    for(var i = 1; i <= 8; i++){

        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        selectTag.appendChild(option);

    }
}

window.onload = function(){

    var timeSelect = document.getElementById("timeSelect");
    var portionSelect = document.getElementById("portionSelect");

    selectTimeGenerate(timeSelect);
    selectPortionGenerate(portionSelect);
}
