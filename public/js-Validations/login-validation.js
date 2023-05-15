function loginValidation(){


var emailInput=document.getElementById('email').value;
var passwordInput=document.getElementById('password').value;

var errorDiv=document.getElementById('error-div');


if(emailInput===""){
  errorDiv.innerText="Please enter your email address!";
  document.getElementById('email').focus();
  return false;
}

if(passwordInput===""){
  errorDiv.innerText="Please enter your password!";
  document.getElementById('password').focus();
  return false;
}

}