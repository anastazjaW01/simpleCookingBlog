function changeColorMode(){

    var logo = document.getElementById("logo");
    var logoText = document.getElementById("logoText");
    var textBtn = document.getElementById("toogle-btn");
    var dropdownMenu = document.querySelectorAll(".dropdown-menu");

    if(document.body.classList.contains("dark-theme")){
        logo.src = "http://localhost/simpleCookingBlog/images/path13547.svg";
        logoText.src = "http://localhost/simpleCookingBlog/images/textGreen.svg";
        document.body.classList.remove('dark-theme');
        textBtn.innerHTML = "<i class='bi bi-moon-stars pe-2' ></i>Dark mode";
        dropdownMenu.forEach(function(menu){
            menu.classList.remove('dropdown-menu-dark');
        })
    }else{
        logo.src = "http://localhost/simpleCookingBlog/images/pathwhite.svg";
        logoText.src = "http://localhost/simpleCookingBlog/images/textWhite.svg";
        document.body.classList.add('dark-theme');
        textBtn.innerHTML = "<i class='bi bi-brightness-high pe-2' ></i>Light mode";
        dropdownMenu.forEach(function(menu){
            menu.classList.add('dropdown-menu-dark');
        })
    }

}