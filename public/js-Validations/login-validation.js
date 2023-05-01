document.addEventListener('DOMContentLoaded', function() {
    const form=document.querySelector('form');
    const emailInput = document.querySelector('#email');
    const passwordInput=document.querySelector('#password');
  
    form.addEventListener('submit',function(event){
        if(!emailInput.value){
            alert('Please enter your email');
            event.preventDefault();
        }
  
        if(!passwordInput.value){
          alert('Please enter a password');
          event.preventDefault();
        }
    });
  });
  

