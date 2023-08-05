@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/user-diet.css')}}">
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif


@php


foreach($diet as $userDiet){
    $totalProteins = $userDiet->proteinGram;
    $totalCarbohydrates=$userDiet->carbohydratesGram;
    $totalCalories=$userDiet->personalized_calories;


}

@endphp


    <div class="daily-summary">

        <div class="card-container">
            <div class="card card-header summary-header">
                <h5><b>Total Nutritional Values:</b> </h5>
                <br>
                <p style="font-style:italic"><strong>Daily Proteins:</strong> {{ $totalProteins }} <span >gram</span></p>
                <p style="font-style:italic"><strong>Daily Carbohydrates:</strong> {{ $totalCarbohydrates }} <span >gram</span></p>
                <p style="font-style:italic"><strong>Daily Calories:</strong> {{  $totalCalories }}</p>
            </div>
        </div>
    </div>



    <div class="card-container">
        @foreach($diet as $userDiet)

       
            <div class="card day-{{ $userDiet->day_of_week }}">
                <div class="card-header" >
                <b  style="color:#C51605" >    {{ strtoupper($userDiet->day_of_week) }}</b>
                   <BR>
                  <p style="font-style:italic">  {{ ($userDiet->food->nameOfFood) }}<p>
                   
                </div>
                <div class="card-body">
                    <p><strong>Category:</strong> {{ $userDiet->food->category }}</p>
                    <p><strong>Day Of Week:</strong> {{ $userDiet->day_of_week }}</p>
                    <p><strong>Meal Type:</strong> {{ $userDiet->mealType }}</p>
                    <p><strong>Vitamin:</strong> {{ $userDiet->food->vitamins }}</p>
                    <p><strong>Proteins:</strong> {{ $userDiet->food->proteins }} <span >gram</span></p>
                    <p><strong>Carbohydrates:</strong> {{ $userDiet->food->carbohydrates }} <span >gram</span></p>
     
                   
                </div>
            </div>
        @endforeach
    </div>

 
  <div class="buttons">
    <p>Before you update your diet, please keep your profile data up to date to get the best results for your diet data.</p>
    <div class="space-btn">

    <a href="{{route('updateMyDiet')}}"><button id="btn-update" class="btn btn-primary">Edit My Diet</button></a>
    @if ($allDiet)
    <form class="delete-form" method="POST" action="{{ route('deleteDiet', $allDiet->diet_id) }}" onsubmit="return confirm('Are you sure you want to delete your diet?');">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete My Diet</button>
    </form>
    <a href="{{route('userprofileshow')}}"><button id="btn-profile" class="btn btn-info">Edit Profile</button></a>
    @endif
    </div>
  </div>
   

</body>
</html>

@endsection
