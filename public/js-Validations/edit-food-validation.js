function validateEditForm(){

    const nameOfFoodRegex =/^[a-zA-Z\s]{2,}$/;
    const categoryRegex = /^[A-Za-z\s]{2,}$/;
    const proteinRegex =  /^[0-9]+$/;
    const vitaminsRegex = /^[a-e]$/;
    const caloriesRegex = /^\d+(\.\d+)?$/;
    const carbohydratesRegex = /^\d+(\.\d+)?$/;

    var errorDiv=document.getElementById('errorDiv');

  const nameOfFoodinput = document.getElementById('nameOfFood').value;
  const categoryinput = document.getElementById('category').value;
  const proteinsinput = document.getElementById('proteins').value;
  const vitaminsinput = document.getElementById('vitamins').value;
  const caloriesinput = document.getElementById('calories').value;
  const carbohydratesinput = document.getElementById('carbohydrates').value;


  if(nameOfFoodinput.trim()===""){
    errorDiv.innerText="Please Enter a Food Name!";
    document.getElementById('nameOfFood').focus();
    return false;
}
  if (!nameOfFoodRegex.test(nameOfFoodinput)) {
    errorDiv.innerText="Food name should have at least 2 letters!";
    document.getElementById('nameOfFood').focus();
    return false;
  }
  if(categoryinput.trim()===""){
    errorDiv.innerText="Please Enter a Food Category!";
    document.getElementById('category').focus();
    return false;
}
  if (!categoryRegex.test(categoryinput)) {
    errorDiv.innerText="Category Field should have at least 2 letters!.";
    document.getElementById('category').focus();
    return false;
  }
  if(proteinsinput.trim()===""){
    errorDiv.innerText="Please Enter a Value for the Proteins Field!";
    document.getElementById('proteins').focus();
    return false;
}
  if (!proteinRegex.test(proteinsinput)) {
    errorDiv.innerText="You can only enter numbers in Proteins Field!";
    document.getElementById('proteins').focus();
    return false;
  }
  if(vitaminsinput.trim()===""){
    errorDiv.innerText="Please Enter a value for the Vitamins Field!";
    document.getElementById('vitamins').focus();
    return false;
}

  if (!vitaminsRegex.test(vitaminsinput)) {
    errorDiv.innerText="The valid input for vitamins field are: a,b,c,d,e.";
    document.getElementById('vitamins').focus();
    return false;
  }

  if(caloriesinput.trim()===""){
    errorDiv.innerText="Please Enter a value for the Calories Field!";
    document.getElementById('calories').focus();
    return false;
}

  if (!caloriesRegex.test(caloriesinput)) {
    errorDiv.innerText="You can only enter numbers in Calories Field!";
    document.getElementById('calories').focus();
    return false;
  }


  if(carbohydratesinput.trim()===""){
    errorDiv.innerText="Please Enter a value for the Carbohydrates Field!";
    document.getElementById('carbohydrates').focus();
    return false;
}
  if (!carbohydratesRegex.test(carbohydratesinput)) {
    errorDiv.innerText="You can only enter numbers in Carbohydrates Field!";
    document.getElementById('carbohydrates').focus();
    return false;
  }
  
  return true;
   
}