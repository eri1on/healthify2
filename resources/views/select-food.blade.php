@extends('layouts.app')
@section('content')



<link rel="stylesheet" href="{{asset('css/select-food.css')}}">
<div class="top-div">
   
<form  id="diet-form" method="POST" action="{{ route('startUserDiet') }}" onsubmit="return valid();" >
   
    @csrf
    <div id="foods-container">
        
       
     
       
        <div class="food-row">
            <label>Food:</label>
            <select class="select-1"name="foods[]" >
                <!-- Render options dynamically from the foods table in the database -->
                @foreach ($foods as $food)
                <option class="options" value="{{ $food->food_id }}">{{ $food->nameOfFood }}</option>
                
                @endforeach
                
            </select>
            @error('foods')
                <span class="error-message" style="color: red; font-weight: 600">{{ $message }}</span>
                @enderror

            <label>Meal Type:</label>
            <select class="select-1"name="meal_types[]" >
               
                <option class="options"value="breakfast">Breakfast</option>
                <option class="options"value="lunch">Lunch</option>
                <option class="options"value="dinner">Dinner</option>
                <option class="options"value="snacks">Snacks</option>
              
                
            </select>
             @error('meal_types')
                <span class="error-message" style="color: red; font-weight: 600">{{ $message }}</span>
                @enderror
            <label>Day of Week:</label>
            <select class="select-1" name="days[]" >
                
                <option class="options"value="monday">Monday</option>
                <option class="options"value="tuesday">Tuesday</option>
                <option class="options"value="wednesday">Wednesday</option>
                <option class="options"value="thursday">Thursday</option>
                <option class="options"value="friday">Friday</option>
                <option class="options"value="saturday">Saturday</option>
                <option class="options"value="sunday">Sunday</option>
                
            </select>
            @error('days')
            <span class="error-message" style="color: red; font-weight: 600">{{ $message }}</span>
            @enderror
            
        </div>
        
    </div>
<div class="buttons">
     <button type="button" id="add-food-row">+</button>
     <img src="../img/sandwich.png"  style="width:80px;">
    <button  class="btn-create"type="submit">Create My Diet</button></div>
    
</form>

<div class="errorDiv">
    <span id="error-message"  style="color:red; font-weight:600"></span><br>
    <span id ="errorDiv" style="color:brown; font-weight:600"></span>
</div>

</div>
<ul>
<li><p style="font-size:large; color:midnightblue; text-transform: uppercase;">Note! you can only choose between 20 to 30 foods, Otherwise you cannot create your Diet</p></li>
<li><p style="color:midnightblue; text-transform: uppercase; ">Once you submit the diet you cannot change the foods before 1 week has passed,<br>after 1 week you can make changes to you diet</p></li>
</ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js-Validations/select-food-validation.js') }}"></script>

@endsection

