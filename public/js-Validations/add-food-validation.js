function validateForm(){

    const nameOfFoodRegex =/^[A-Za-z]{2,}$/;
    const categoryRegex = /^[A-Za-z]{2,}$/;
    const proteinRegex =  /^[0-9]+$/;
    const vitaminsRegex = /^[a-e]$/;
    const caloriesRegex = /^\d+(\.\d+)?$/;
    const carbohydratesRegex = /^\d+(\.\d+)?$/;

    var errorDiv=document.getElementById('errorDiv');

  const nameOfFood = document.getElementById('nameOfFood').value;
  const category = document.getElementById('category').value;
  const proteins = document.getElementById('proteins').value;
  const vitamins = document.getElementById('vitamins').value;
  const calories = document.getElementById('calories').value;
  const carbohydrates = document.getElementById('carbohydrates').value;


  if(nameOfFood.trim()===""){
    errorDiv.innerText="Please Enter a Food Name!";
    document.getElementById('nameOfFood').focus();
    return false;
}
  if (!nameOfFoodRegex.test(nameOfFood)) {
    errorDiv.innerText="Food name should have at least 2 letters!";
    document.getElementById('nameOfFood').focus();
    return false;
  }
  if(category.trim()===""){
    errorDiv.innerText="Please Enter a Food Category!";
    document.getElementById('category').focus();
    return false;
}
  if (!categoryRegex.test(category)) {
    errorDiv.innerText="Category Field should have at least 2 letters!.";
    document.getElementById('category').focus();
    return false;
  }
  if(proteins.trim()===""){
    errorDiv.innerText="Please Enter a Value for the Proteins Field!";
    document.getElementById('proteins').focus();
    return false;
}
  if (!proteinRegex.test(proteins)) {
    errorDiv.innerText="You can only enter numbers in Proteins Field!";
    document.getElementById('proteins').focus();
    return false;
  }
  if(vitamins.trim()===""){
    errorDiv.innerText="Please Enter a value for the Vitamins Field!";
    document.getElementById('vitamins').focus();
    return false;
}

  if (!vitaminsRegex.test(vitamins)) {
    errorDiv.innerText="The valid input for vitamins field are: a,b,c,d,e.";
    document.getElementById('vitamins').focus();
    return false;
  }

  if(calories.trim()===""){
    errorDiv.innerText="Please Enter a value for the Calories Field!";
    document.getElementById('calories').focus();
    return false;
}

  if (!caloriesRegex.test(calories)) {
    errorDiv.innerText="You can only enter numbers in Calories Field!";
    document.getElementById('calories').focus();
    return false;
  }


  if(carbohydrates.trim()===""){
    errorDiv.innerText="Please Enter a value for the Carbohydrates Field!";
    document.getElementById('carbohydrates').focus();
    return false;
}
  if (!carbohydratesRegex.test(carbohydrates)) {
    errorDiv.innerText="You can only enter numbers in Carbohydrates Field!";
    document.getElementById('carbohydrates').focus();
    return false;
  }

  return true;

}