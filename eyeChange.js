let state=false;
let state1=true;

function showHide(){

    if(state){
        document.getElementById("password").setAttribute("type","password");
        state=false;
    }else{
        document.getElementById("password").setAttribute("type", "text");
        state=true;
    }
}

function showHide1(){

    if(state1){
        document.getElementById("cpassword").setAttribute("type","password");
        state1=true;
    }else{
        document.getElementById("cpassword").setAttribute("type", "text");
        state1=false;
    }
}

function changeIcon(){
    let icon=document.getElementById("icon");
    icon.classList.toggle("bi-eye-slash-fill");
}

function changeIcon1(){
    let icon=document.getElementById("icon1");
    icon.classList.toggle("bi-eye-slash-fill");
}
