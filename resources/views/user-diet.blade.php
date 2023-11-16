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
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif





    @if(!$allDiet)


    <div class="Message">
        <h2>No Diet Found!</h2> 
        <a href={{route('select-food')}}>Create One</a>
        

    </div>
    
    @else

@php


foreach($diet as $userDiet){
    $totalProteins = $userDiet->proteinGram;
    $totalCarbohydrates=$userDiet->carbohydratesGram;
    $totalCalories=$userDiet->personalized_calories;


}

@endphp




    <div class="daily-summary">
        <p style="color:darkblue; font-size:medium">Note: If you have made changes to your profile data please make sure to edit your diet once again!.</p>
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
    <br><b><br> <br><b><br>




    <div class="card-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Day of Week</th>
                    <th>Food Name</th>
                    <th>Category</th>
                    <th>Meal Type</th>
                    <th>Vitamin</th>
                    <th>Proteins</th>
                    <th>Carbohydrates</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentDay = null;
                @endphp
                @foreach($diet as $userDiet)
                    @if ($currentDay !== $userDiet->day_of_week)
                        @php
                            $currentDay = $userDiet->day_of_week;
                        @endphp
                        <tr class="day-separator">
                            <td colspan="7"><strong class="day-label">{{ ucfirst($userDiet->day_of_week) }}</strong></td>
                        </tr>
                    @endif
                    <tr class="day-{{ $userDiet->day_of_week }}">
                        <td>{{ ucfirst($userDiet->day_of_week) }}</td>
                        <td>{{ strtoupper($userDiet->food->nameOfFood) }}</td>
                        <td>{{ strtoupper($userDiet->food->category) }}</td>
                        <td>{{ $userDiet->mealType }}</td>
                        <td>{{ strtoupper($userDiet->food->vitamins) }}</td>
                        <td>{{ strtoupper($userDiet->food->proteins) }} gram</td>
                        <td>{{ strtoupper($userDiet->food->carbohydrates) }} gram</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 

    <div class="buttons">
      
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

@endif
@endsection
