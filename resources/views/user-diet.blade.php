
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
    @if(session('error'))<!-- This will display a error message when a user who is not admin manages somehow to go to the dashboard page and tries to update or delete user account/info-->
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="table-container">
    <table>
        <thead style="color:#5C8984;  position: sticky;">
 <th>Category</th>
<th>Food Item</th>
<th>Day Of Week</th>
<th>Meal Type</th>
<th>Vitamin</th>
<th>Proteins</th>
<th>Carbohydrates</th>
<th>Daily Calories</th>

        </thead>

        <tbody>
            @php
            $previousDay = null;
        @endphp


            @foreach($diet as $userDiet)
         
            <tr style="text-transform: uppercase;">
                <td>{{ $userDiet->food->category }}</td>
                <td>{{ $userDiet->food->nameOfFood }}</td>
                <td>{{ $userDiet->day_of_week }}</td>
                <td>{{ $userDiet->mealType }}</td>
                <td>{{ $userDiet->food->vitamins }}</td>
                <td>{{ $userDiet->food->proteins }}</td>
                <td>{{ $userDiet->food->carbohydrates }}</td>
                @if ($userDiet->day_of_week !== $previousDay)
                <td style="color:midnightblue;font-size:large">{{ $userDiet->personalized_calories }}
                    <span style="color:green; font-weight:700; font-size:small; text-transform: uppercase;">({{$userDiet->day_of_week}})</span><br>  <br><br></td>
                  
                @endif
                
            </tr>
       
        @php
            $previousDay = $userDiet->day_of_week;
        @endphp
      
            @endforeach

        </tbody>


    </table>
    </div>
    <a href="{{route('updateMyDiet')}}"><button class="btn btn-primary">Update My Diet</button></a>
</body>
</html>

@endsection