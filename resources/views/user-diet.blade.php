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
                <p ><strong >Daily Calories:</strong> <span style="color:#080202;font-size:large"> {{  $totalCalories }} <span></p>
                <p><strong>Daily Proteins:</strong> <span style="color:#080202;font-size:large"> {{ $totalProteins }}  <span style="color:#C51605"> gram </span> </span></p>
                <p ><strong>Daily Carbohydrates:</strong><span style="color:#080202;font-size:large">  {{ $totalCarbohydrates }}  <span style="color:#C51605">  gram </span></span> </p>
            </div>
        </div>

    </div>


 
    





    <div class="card-container">
        @foreach($diet as $userDiet)

       
            <div class="card day-{{ $userDiet->day_of_week }}">
                <div class="card-header" >
                <b  style="color:#0E2954" >    {{ strtoupper($userDiet->day_of_week) }}</b>
                   <BR>
                  <p class="foodname"style="font-family: sans-serif">  {{strtoupper ($userDiet->food->nameOfFood) }}<p>
                   
                </div>
                <div class="card-body">
                    <p><strong  style="color:#6C3428">Category:</strong>   <span>  {{  strtoupper($userDiet->food->category )}} </span></p>
                    <p><strong style="color:#6C3428">Day Of Week:</strong>  <span> {{strtoupper( $userDiet->day_of_week )}} </span></p>
                    <p><strong style="color:#6C3428">Meal Type:</strong> <span> {{ $userDiet->mealType }}</span> </p>
                    <p><strong style="color:#6C3428">Vitamin:</strong> <span> {{ strtoupper($userDiet->food->vitamins) }} </span></p>
                    <p><strong style="color:#6C3428">Proteins:</strong> <span style="color:#C51605"> {{ strtoupper($userDiet->food->proteins) }} gram</span></p>
                    <p><strong style="color:#6C3428">Carbohydrates:</strong> <span style="color:#C51605">{{ strtoupper($userDiet->food->carbohydrates )}} gram</span> </p>
     
                   
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
