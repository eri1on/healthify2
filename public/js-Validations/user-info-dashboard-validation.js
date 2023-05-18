function userProfileInfoValidation(){


    const nameRegex= /^[a-zA-z]{2,}/;
    const emailRegex= /^[a-z0-9]+([_.-][a-z0-9]+)*@[a-z0-9]+([.-][a-z0-9]+)*\.[a-z]{2,3}$/;
    const passwordRegex=/^.{8,}$/;
    const ageRegex=/^\d{2}$/;
    const genderRegex=/^(male|female)$/i;
    const heightRegex=/^(?:[1-2]\d{2}|3[0-4]\d|350)$/;
    const weightRegex=/^([3-9][0-9]{1}|[1-9][0-9]{2}|400)$/;
    const goalRegex=/^(lose_weight|gain_weight)$/i;
    const activityRegex=/^(high_activity|low_activity)$/i;
  
    
    var nameInput=document.getElementById('name').value;
    var emailInput=document.getElementById('email').value;
    var passwordInput=document.getElementById('password').value;
    var confirmPasswordInput=document.getElementById('password_confirmation').value;
    var ageInput=document.getElementById('age').value;
    var genderInput=document.getElementById('gender').value;
    var heightInput=document.getElementById('height').value;
    var weightInput=document.getElementById('weight').value;
    var goalInput=document.getElementById('goal').value;
    var activityInput=document.getElementById('activity').value;
    var isadminInput=document.getElementById('is_admin').value;
    var issuperadminInput=document.getElementById('is_superadmin').value;

    var errorDiv=document.getElementById('errorDiv');
    
    if(nameInput.trim()===""){
        errorDiv.innerText="Please enter your name!";
        document.getElementById('name').focus();
        return false;
    }
    if(!nameRegex.test(nameInput)){
        errorDiv.innerText="Name should have at least 2 characters.";
        document.getElementById('name').focus();
        return false;
    }
    
    if(emailInput.trim()===""){
        errorDiv.innerText="Please enter your Email!";
        document.getElementById('email').focus();
        return false;
    }
    if(!emailRegex.test(emailInput)){
        errorDiv.innerText="Please enter a valid email address";
        document.getElementById('email').focus();
        return false;
    }
    
    if(passwordInput.trim()!==""){
       
    
    if(!passwordRegex.test(passwordInput)){
        errorDiv.innerText="Password must be at least 8 characters long.";
        document.getElementById('password').focus();
        return false;
    }
    
    if(confirmPasswordInput !== passwordInput){
        errorDiv.innerText="Passwords don't match!";
        document.getElementById('password_confirmation').focus();
        return false;
    }
}
    
    if(ageInput.trim()===""){
        errorDiv.innerText="Please enter your Age!";
        document.getElementById('age').focus();
        return false;
    }
    if(!ageRegex.test(ageInput)){
        errorDiv.innerText="Your age can have 2 numbers";
        document.getElementById('age').focus();
        return false;
    }
    if (parseInt(ageInput) < 18) {
        errorDiv.innerText = "You must be at least 18 years old.";
        document.getElementById('age').focus();
        return false;
      }
    
    
    
    if(genderInput.trim()===""){
        errorDiv.innerText="Please enter your Gender!";
        document.getElementById('gender').focus();
        return false;
    }
    if(!genderRegex.test(genderInput)){
        errorDiv.innerText="Gender can be 'Male' or 'Female'";
        document.getElementById('gender').focus();
        return false;
    }
    
    if(heightInput.trim()===""){
        errorDiv.innerText="Please enter your Height";
        document.getElementById('height').focus();
        return false;
    }
    if(!heightRegex.test(heightInput)){
        errorDiv.innerText="Invalid height. Please enter a value between 100cm and 350cm.";
        document.getElementById('height').focus();
        return false;
    }
    if(weightInput.trim()===""){
        errorDiv.innerText="Please enter your Weight";
        document.getElementById('weight').focus();
        return false;
    }
    if(!weightRegex.test(weightInput)){
        errorDiv.innerText= "Please enter a valid weight between 30 and 400 kg";
        document.getElementById('weight').focus();
        return false;
    }
    
    if(goalInput.trim()===""){
        errorDiv.innerText="Please enter your Goal";
        document.getElementById('goal').focus();
        return false;
    }
    if(!goalRegex.test(goalInput)){
        errorDiv.innerText="Invalid goal selected.";
        document.getElementById('goal').focus();
        return false;
    }
    
    
    if(activityInput.trim()===""){
        errorDiv.innerText="Please enter your Activity";
        document.getElementById('activity').focus();
        return false;
    }
    if(!activityRegex.test(activityInput)){
        errorDiv.innerText="Invalid activity level selected.";
        document.getElementById('activity').focus();
        return false;
    }

     
    if(isadminInput.trim()===""){
        errorDiv.innerText="Please enter a value in the admin role.";
        document.getElementById('is_admin').focus();
        return false;
    }

    if(issuperadminInput.trim()===""){
        errorDiv.innerText="Please enter a value in the super Admin role.";
        document.getElementById('is_superadmin').focus();
        return false;
    }
    
   


    return true;
    }