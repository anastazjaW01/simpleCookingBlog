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
    input.type = "text";
    input.name = "ingridient[]";
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
        option.value = parseFloat(i);
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

//CATEGORY
//creating lists with categories
let categoryList = ["bread", "desserts", "fish", "meat", "salad", "snacks", "soups", "vege"];
let worldCuisinesList = ["American", "Indian", "Italian", "Japanese", "Polish", "Spanish"];

function createCategorySection(x, list, startIndex) {
    //category on left side
    let sideLeft = document.createElement("div");
    sideLeft.classList.add("left-cat");
    x.appendChild(sideLeft);
    //category on right side
    let sideRight = document.createElement("div");
    sideRight.classList.add("right-cat");
    x.appendChild(sideRight);

    //Loop to create elements for both sides
    for (var i = 0; i < list.length; i++) {
        let side = i < list.length/2 ? sideLeft : sideRight;
        //create label
        let label = document.createElement("label");
        side.appendChild(label);
        //create input
        let category = document.createElement("input");
        category.type = "radio";
        category.name = "category";
        category.value = startIndex + i + 1;
        label.appendChild(category);
        let labelText = document.createTextNode(" " + list[i]);
        label.appendChild(labelText);
    }
}

//Function to create upper section with categories 
function categorySectionCreate(x) {
    createCategorySection(x, categoryList, 0);
}

//Function to create bottom section with categories
function worldCuisineSectionCreate(x) {
    //create subtitle
    let subtitle = document.createElement("p");
    subtitle.classList.add("ps-2", "p-0", "m-0");
    subtitle.textContent = "Cuisines of the world";
    x.appendChild(subtitle);

    createCategorySection(x, worldCuisinesList, 8);
}

//Calling both functions after the page is loaded
window.onload = function () {

    //get id from category section
    var categorySection = document.getElementById("category");
    categorySectionCreate(categorySection);
    worldCuisineSectionCreate(categorySection);

       //get id from select tags 
       var timeSelect = document.getElementById("timeSelect");
       var portionSelect = document.getElementById("portionSelect");
   
       //run function to generate time and portion
       selectTimeGenerate(timeSelect);
       selectPortionGenerate(portionSelect);
};

