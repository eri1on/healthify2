@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/adminDietEdit.css') }}">
<div class="top-div">
    <div class="text-background">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger" style="background-color: red; color:white">
            {{ session('error') }}
        </div>
    @endif
    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <h2>Update User Diet</h2>

    <form id="diet-form" method="POST"  onsubmit="return valid();">
        @method('PUT')
        @csrf
        <div id="foods-container">
            @foreach ($mealPlans as $index => $mealPlan)
            <div class="food-row">
                <label>Food:</label>
                <select class="select-1" name="foods[]">
                    @foreach ($foods as $food)
                    <option value="{{ $food->food_id }}" {{ $food->food_id == $mealPlan->fk_food_id ? 'selected' : '' }}>
                        {{ $food->nameOfFood }}
                    </option>
                    @endforeach
                </select>

                <label>Meal Type:</label>
                <select class="select-1" name="meal_types[]">
                    <option value="breakfast" {{ $mealPlan->mealType == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                    <option value="lunch" {{ $mealPlan->mealType == 'lunch' ? 'selected' : '' }}>Lunch</option>
                    <option value="dinner" {{ $mealPlan->mealType == 'dinner' ? 'selected' : '' }}>Dinner</option>
                    <option value="snacks" {{ $mealPlan->mealType == 'snacks' ? 'selected' : '' }}>Snacks</option>
                </select>

                <label>Day of Week:</label>
                <select class="select-1" name="days[]">
                    <option value="monday" {{ $mealPlan->day_of_week == 'monday' ? 'selected' : '' }}>Monday</option>
                    <option value="tuesday" {{ $mealPlan->day_of_week == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="wednesday" {{ $mealPlan->day_of_week == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="thursday" {{ $mealPlan->day_of_week == 'thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="friday" {{ $mealPlan->day_of_week == 'friday' ? 'selected' : '' }}>Friday</option>
                    <option value="saturday" {{ $mealPlan->day_of_week == 'saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="sunday" {{ $mealPlan->day_of_week == 'sunday' ? 'selected' : '' }}>Sunday</option>
                </select>
            </div>
            @endforeach
        </div>
        <button type="button" id="add-food-row">+</button>
        <button type="submit" class="btn btn-primary">Update Diet</button>
    </form>
    <div class="errorDiv">
        <span id="error-message" style="color:red; font-weight:600"></span><br>
        <span id="errorDiv" style="color:brown; font-weight:600"></span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js-Validations/select-food-validation.js') }}"></script>
</div>

@endsection
