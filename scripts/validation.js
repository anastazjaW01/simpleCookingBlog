//get variables from form
let alertBoxes = document.querySelectorAll('.alert_pass');
let password=document.getElementById('password');
let cpassword = document.getElementById('cpassword');
let email = document.getElementById('email');
let login = document.getElementById('login');
let passwordStrength=document.getElementById('passwordStrength');
let wasBlurred = false;

//function check password conditions and show/delete alerts when value is change
password.addEventListener('input', function() {
    let pass = this.value;
    let conditions = [
        pass.length < 8,
        !pass.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/),
        !pass.match(/[0-9]/),
        !pass.match(/[!@#$%^&*?.,]/)
    ];

    // Show alerts only if field was leaved erlier
    if (wasBlurred) {
        alertBoxes.forEach((alert, index) => {
            alert.classList.toggle('alert-hidden', !conditions[index]);
        });
    }
});

//function check password conditions and show alerts when field was leaved
password.addEventListener('blur', function() {
    wasBlurred = true;
    let pass = this.value;
    let conditions = [
        pass.length < 8,
        !pass.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/),
        !pass.match(/[0-9]/),
        !pass.match(/[!@#$%^&*?.,]/)
    ];

   // Show alerts after leave input field
    alertBoxes.forEach((alert, index) => {
        alert.classList.toggle('alert-hidden', !conditions[index]);
    });
});

//check password function 
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
