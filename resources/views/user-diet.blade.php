
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
@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif



    <div class="table-container">
    <table>
        <thead style="color:#5C8984;  position: sticky;">
 <th>Category</th>
<th>Food Item</th>

<!-- <th>Portion Size</th>  !-->

<th>Day Of Week</th>
<th>Meal Type</th>
<th>Vitamin</th>
<th>Proteins</th>
<th>Carbohydrates</th>

 <!-- <th>Grams</th>   !-->

<th>Daily Proteins</th>
<th>Daily Carbohydrates</th>
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

          <!--      <td> $userDiet->portion_size  </td>   !-->

                <td>{{ $userDiet->day_of_week }}</td>
                <td>{{ $userDiet->mealType }}</td>
                <td>{{ $userDiet->food->vitamins }}</td>
                <td>{{ $userDiet->food->proteins }}</td>
                <td>{{ $userDiet->food->carbohydrates }}</td>
                
             <!--   <td style="color:midnightblue;font-size:large"> $userDiet->personalized_grams</td>    !-->

                @if ($userDiet->day_of_week !== $previousDay)

                <td>
                    {{$userDiet->proteinGram }}
                </td>
                <td>{{$userDiet->carbohydratesGram}}</td>


                <td style="color:midnightblue;font-size:large;">{{ $userDiet->personalized_calories }}
                    <span style="color:green; font-weight:700; font-size:small; text-transform: uppercase;">({{$userDiet->day_of_week}})</span><br>  <br><br>
                </td>
                  
                @endif
                
            </tr>
       
        @php
            $previousDay = $userDiet->day_of_week;
        @endphp
      
            @endforeach

        </tbody>


    </table>
    </div>

    <P>Before you update your diet Please keep your profile data up to date to get the best results for your diet data</p>
  
    <a href="{{route('updateMyDiet')}}"><button id="btn-update"class="btn btn-primary">Edit My Diet</button></a>
    @if ($allDiet)
    <form class="delete-form"method="POST" action="{{ route('deleteDiet', $allDiet->diet_id) }}" onsubmit="return confirm('Are you sure you want to delete your diet?');">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete My Diet</button>
    </form>

    <a href="{{route('userprofileshow')}}"><button id="btn-profile" class="btn btn-info">Edit Profile</button></a>
@endif


</body>
</html>

@endsection