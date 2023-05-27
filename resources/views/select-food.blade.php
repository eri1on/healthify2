@extends('layouts.app')
@section('content')



<link rel="stylesheet" href="{{asset('css/select-food.css')}}">
<div class="top-div">
    <h5>Create Your Diet</h5>
<form  id="diet-form" method="POST" action="{{ route('startUserDiet') }}" onsubmit="return valid();">
   
    @csrf
    <div id="foods-container">
        <h4><span style="color:red; font-weight:500">Note!</span>You can choose foods for you diet only once a week. After 1 week you can make changes to you diet!</h4>
        <p>So please do this proccess carefully </p>
       
        <div class="food-row">
            <label>Food:</label>
            <select class="select-1"name="foods[]" >
                <!-- Render options dynamically from the foods table in the database -->
                @foreach ($foods as $food)
                <option class="options" value="{{ $food->food_id }}">{{ $food->nameOfFood }}</option>
                
                @endforeach
                
            </select>
           
            <label>Meal Type:</label>
            <select class="select-1"name="meal_types[]" >
               
                <option class="options"value="breakfast">Breakfast</option>
                <option class="options"value="lunch">Lunch</option>
                <option class="options"value="dinner">Dinner</option>
                <option class="options"value="snacks">Snacks</option>
                
            </select>
            
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
            
        </div>
        
    </div>
<div class="buttons">
    <button type="button" id="add-food-row">+</button>
    <button  class="btn-create"type="submit">Create My Diet</button></div>
    
</form>
<div class="errorDiv">
    <span id="error-message"  style="color:red; font-weight:600"></span><br>
    <span id ="errorDiv" style="color:brown; font-weight:600"></span>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js-Validations/select-food-validation.js') }}"></script>

@endsection

