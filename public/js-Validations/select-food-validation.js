

$(document).ready(function() {
    $('#add-food-row').click(function() {
        var lastRow = $('.food-row:last');
        var clonedRow = lastRow.clone();
        clonedRow.find('select').val('');
        clonedRow.find('input').val('');
        clonedRow.appendTo('#foods-container');
    });

    $('#diet-form').submit(function(e) {
        if ($('.food-row').length < 20 || $('.food-row').length > 30) {
            e.preventDefault();
            $('#error-message').text('Please select  between 20 and 30 foods!');
        }
    });
});

function valid() {
    var foods = document.getElementsByName('foods[]');
    var mealTypes = document.getElementsByName('meal_types[]');
    var days = document.getElementsByName('days[]');
    var errorDiv=document.getElementById('errorDiv');

    // Check if any field is empty
    for (var i = 0; i < foods.length; i++) {
        if (foods[i].value === '' || mealTypes[i].value === '' || days[i].value === '') {
            errorDiv.innerText="please fill in all the fields!"
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


    // Check if meal type is valid
    var validMealTypes = ['breakfast', 'lunch', 'dinner', 'snacks'];
    for (var i = 0; i < mealTypes.length; i++) {
        if (!validMealTypes.includes(mealTypes[i].value.toLowerCase())) {
            errorDiv.innerText="Invalid meal type. Please enter a valid meal type (e.g., Breakfast, Lunch, Dinner, Snacks).";
            return false;
        }
    }

    return true;
}
