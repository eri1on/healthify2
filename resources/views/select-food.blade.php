
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{asset('css/select-food.css')}}>
</head>
<body>
    <section class="food-section">
        <div class="food-container">
          <h2 class="food-title">Your Diet Starts Here:</h2>
          <p class="food-paragraph">! Please choose the foods carefully and note that the food you select for your diet will be the food for 1 week and you cannot change it.</p>
          <form id="food-form" action="/submit" method="post">
          <table class="food-table">
            <thead>
              <tr>
                <th>Category</th>
                <th>Food Item</th>
                <th>Day Of The Week</th>
                <th>Meal Type</th>
                <th>Select</th>
              </tr>
            </thead>
            <tbody>
           @foreach ($allFoods as $food)
           <tr>
            <td>{{$food->category}}</td>
            <td>{{$food->nameOfFood}}</td>
                <td>
                    <select name="day">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                      </select>

                </td>

                <td>
                 <select name="mealType">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Snacks">Snacks</option>
                   
                 </select>

                </td>
            
            <td>
                <input type="checkbox" name="food[]" value="{{ $food->id }}">
            </td>
          </tr>
          @endforeach
            </tbody>
          </table>
          <div class="field-div-btn">
            <button type="submit" class="btn btn-primary">
                {{ __('Create My Diet') }}
            </button>
        </div>
          </form>
        </div>
      </section>
</body>
</html>
@endsection