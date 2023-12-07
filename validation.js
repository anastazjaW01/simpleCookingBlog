//let passwordLength=document.querySelector('.lenght');
//let number=document.querySelector('.number');
//let specialSing=document.querySelector('.special_sing');
//let lowerUpper=document.querySelector('.lower_upper');

let password=document.getElementById('password');
let passwordStrength=document.getElementById('passwordStrength');

password.addEventListener('keyup',function(){
    let pass=document.getElementById('password').value;
    checkPassword(pass);
})

function checkPassword(password){
    let strength=0;
    if(password.length>7) strength+=1;
    if(password.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/)) strength+=1;
    if(password.match(/([0-9])/)) strength+=1;
    if(password.match(/([!,@,#,$,%,&,^,*,_,?,.])/)) strength+=1;

    //check password strength
    if(strength<=0){
        passwordStrength.classList.remove('bg-warining');
        passwordStrength.classList.remove('bg-succes');
        passwordStrength.classList.add('bg-danger');
        passwordStrength.style='width:0';
    }else if(strength<=2){
        passwordStrength.classList.remove('bg-warning');
        passwordStrength.classList.remove('bg-succes');
        passwordStrength.classList.add('bg-danger');
        passwordStrength.style='width:10%';
    }else if(strength===3){
        passwordStrength.classList.remove('bg-danger');
        passwordStrength.classList.remove('bg-succes');
        passwordStrength.classList.add('bg-warning');
        passwordStrength.style='width:60%';
    }else if(strength===4){
        passwordStrength.classList.remove('bg-danger');
        passwordStrength.classList.remove('bg-warning');
        passwordStrength.classList.add('bg-success');
        passwordStrength.style='width:100%';
    }
}