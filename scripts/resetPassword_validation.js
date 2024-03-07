//get variables from form
let alertBoxes = document.querySelectorAll(".alert_pass");
let password = document.getElementById("password");
let cpassword = document.getElementById("cpassword");
let passwordStrength = document.getElementById("passwordStrength");
let wasBlurred = false;

//function check password conditions and show/delete alerts when value is change
password.addEventListener("input", function () {
  let pass = this.value;
  let conditions = [
    pass.length < 8,
    !pass.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/),
    !pass.match(/[0-9]/),
    !pass.match(/[!@#$%^&*?.,]/),
  ];

  // Show alerts only if field was leaved erlier
  if (wasBlurred) {
    alertBoxes.forEach((alert, index) => {
      alert.classList.toggle("alert-hidden", !conditions[index]);
    });
  }
});

//function check password conditions and show alerts when field was leaved
password.addEventListener("blur", function () {
  wasBlurred = true;
  let pass = this.value;
  let conditions = [
    pass.length < 8,
    !pass.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/),
    !pass.match(/[0-9]/),
    !pass.match(/[!@#$%^&*?.,]/),
  ];

  // Show alerts after leave input field
  alertBoxes.forEach((alert, index) => {
    alert.classList.toggle("alert-hidden", !conditions[index]);
  });
});

//check password function
password.addEventListener("keyup", function () {
  let pass = document.getElementById("password").value;
  checkPassword(pass);
});

//function to check password strenght
function checkPassword(password) {
  let strength = 0;
  if (password.length > 7) strength += 1;
  if (password.match(/([A-Z].*[a-z])|([a-z].*[A-Z])/)) strength += 1;
  if (password.match(/([0-9])/)) strength += 1;
  if (password.match(/([!,@,#,$,%,&,^,*,_,?,.])/)) strength += 1;

  //check password strength
  if (strength <= 0) {
    passwordStrength.classList.remove("bg-warining");
    passwordStrength.classList.remove("bg-succes");
    passwordStrength.classList.add("bg-danger");
    passwordStrength.style = "width:0";
  } else if (strength <= 2) {
    passwordStrength.classList.remove("bg-warning");
    passwordStrength.classList.remove("bg-succes");
    passwordStrength.classList.add("bg-danger");
    passwordStrength.style = "width:10%";
  } else if (strength === 3) {
    passwordStrength.classList.remove("bg-danger");
    passwordStrength.classList.remove("bg-succes");
    passwordStrength.classList.add("bg-warning");
    passwordStrength.style = "width:60%";
  } else if (strength === 4) {
    passwordStrength.classList.remove("bg-danger");
    passwordStrength.classList.remove("bg-warning");
    passwordStrength.classList.add("bg-success");
    passwordStrength.style = "width:100%";
  }
}

// functions that check cpassword conditions and show alerts
//CPASSWORD
let wasBlurred_03 = false;

//an event that calls the function when the input field is leave
cpassword.addEventListener("blur", function () {
  let alert = document.getElementById("match-pass-alert");
  let cpassword = this.value;
  let pass = password.value;
  showAlertsC(alert, cpassword, pass);
  wasBlurred_03 = true;
});

//an event that triggers a function while typing, provided that the field has been previously left
cpassword.addEventListener("keyup", function () {
  let alert = document.getElementById("match-pass-alert");
  let cpassword = this.value;
  let pass = password.value;
  if (wasBlurred_03) {
    hideAlertsC(alert, cpassword, pass);
  }
});

//functions responsible for displaying alert for cpassword when the condition is not met
function showAlertsC(alert, val1, val2) {
  if (val1 !== val2) {
    alert.classList.remove("alert-hidden");
  }
}

function hideAlertsC(alert, val1, val2) {
  if (val1 !== val2) {
    alert.classList.remove("alert-hidden");
  } else {
    alert.classList.add("alert-hidden");
  }
}
