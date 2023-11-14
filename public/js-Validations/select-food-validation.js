

$(document).ready(function() {
    $('#add-food-row').click(function() {

       
        var lastRow = $('.food-row:last');
        var clonedRow = lastRow.clone();
        clonedRow.find('select').val('');
        clonedRow.find('input').val('');
        clonedRow.appendTo('#foods-container');

        $('.food-row').each(function(index) {
            $(this).find('.row-number').text(index + 1);
        });

        if ($('.food-row').length >= 30) {
            $('#add-food-row').hide();
        }
        
    });
   

    $('#diet-form').submit(function(e) {
        if ($('.food-row').length < 28 || $('.food-row').length > 30) {
            e.preventDefault();
            $('#error-message').text('Please select  between 28-30 foods!');
        }
    });
});

function valid() {
    var foods = document.getElementsByName('foods[]');
    var mealTypes = document.getElementsByName('meal_types[]');
    var days = document.getElementsByName('days[]');
    var errorDiv = document.getElementById('errorDiv');

    // Check if any field is empty
    for (var i = 0; i < foods.length; i++) {
        if (foods[i].value === '' || mealTypes[i].value === '' || days[i].value === '') {
            errorDiv.innerText = "Please fill in all the fields!";
            return false;
        }
    }

   

    var validDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    
    for (var i = 0; i < validDays.length; i++) {
        var selectedFoods = 0; 
        for (var j = 0; j < days.length; j++) {
            if (days[j].value.toLowerCase() === validDays[i]) {
                selectedFoods++;
            }
        }
        if (selectedFoods < 4) {
            errorDiv.innerText = "You must select at least 4 foods for each day.";
            return false;
        }
    }




   
      // Check if day of week is valid
      var validDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

      
      for (var i = 0; i < days.length; i++) {
          if (!validDays.includes(days[i].value.toLowerCase())) {
              errorDiv.innerText="Invalid day of the week. Please enter a valid day (e.g., Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday).";
              return false;
          }
      }




    // Check if meal type is valid
    var validMealTypes = ['breakfast', 'lunch', 'dinner', 'snacks'];
    for (var i = 0; i < mealTypes.length; i++) {
        if (!validMealTypes.includes(mealTypes[i].value.toLowerCase())) {
            errorDiv.innerText = "Invalid meal type. Please enter a valid meal type (e.g., Breakfast, Lunch, Dinner, Snacks).";
            return false;
        }
    }


    var selectedFoodsArray = Array.from(foods).map(food => food.value);
    if (new Set(selectedFoodsArray).size < 10) {
        errorDiv.innerText = "You must select at least 10 different foods initially.";
        return false;
    }

   

    return true;
}
