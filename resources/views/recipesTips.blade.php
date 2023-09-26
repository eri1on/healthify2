@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Recipes & Tips</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="icon" sizes="400x400" href="../img/recipesFavicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/recipesTips.css">
</head>
<body>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}

</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
    </div>
@endif
@php
$user= auth()->user();
@endphp


    <div class="introFood">
        <div class="introText">
            Good food, good mood. <br>
            <div class="poTate">Healthify</div>
        </div>
        <div class="introImg1">
            <img class="introImg" src="../img/food1.png" alt="">
        </div>
    </div>

    <div class="mealContainer">
        <div class="mealHeader">Our Recipes & Tips</div>
        @php
        $reversedData = $data->reverse();
    @endphp
        @foreach($reversedData as $recipe)
        <div class="mealTwo">
            <div class="picTwo">
                <img class="meal2" src="../img/meal2.jpeg" alt="">
            </div>
            <div class="textTwo">
                <div class="headTwo">{{ $recipe->title }}</div>
                <div class="textTwoContainer">
                    {{ $recipe->description }}
                    <div class="recipe-buttons">
                        
                      @if($user->is_admin || $user->is_superadmin)
                        <button class="update-button"> <a href="{{ route('editRecipe', $recipe->id) }}">Edit</a></button>

                        <form action="{{ route('deleteRecipe', $recipe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="update-button" type="submit">Delete</button>
                        </form>
                      @endif

                    </div>
                </div>

            </div>


        </div>

        @endforeach
        <div class="dietButton">
            <button class="btn"><a href="../MyDiet/MyDiet.html">Create Your Own Diet</a></button>
        </div>

    </div>


    <div class="info-container">
        <div class="leftInfo">
            <div class="infoHead"><span style="color: rgb(42, 230, 42);">H</span>ealthify</div>
            Instead of indulging in ‘comfort food,’ indulge in comfort meditation, comfort journaling, comfort walking, comfort talking, comfort manicures, comfort reading, comfort yoga, comfort hugging. Someone busier than you is running right now.
        </div>
        <div class="midInfo">
            <div class="midText">Connect With Us<br><br></div>
            <a href="#" class="fa fa-youtube" style="padding-right: 30px; margin-left: 25px;"></a>
            <a href="#" class="fa fa-facebook" style="padding-right: 30px;"></a>
            <a href="#" class="fa fa-instagram" style="padding-right: 30px;"></a>
            <a href="#" class="fa fa-twitter" style="padding-right: 30px;"></a>
        </div>
        <div class="rightInfo">
            <div class="rightText">Contact Us</div>
            <i class="fa fa-envelope"> - info@healthify@gmail.com <br></i>
            <i class="fa fa-phone"> - 04*-***-***</i>
        </div>
    </div>

    <footer class="footer">
        Copyright 2023 | HEALTHIFY. Professional Diet Application
    </footer>
</body>
</html>

@endsection
