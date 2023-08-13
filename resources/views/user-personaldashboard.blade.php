@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/personaldashboard.css')}}">
</head>
<body>
    @if(session('success'))<!-- This will display a error message when a user who is not admin manages somehow to go to the dashboard page and tries to update or delete user account/info-->
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
 
<div class="main-div">



<div class="left-div">

    <div class="left-div-logo">

        <a href="/" > <img class="main-logo"src="../img/Healthify_LOGO.png" alt="logo"/> </a>
       <a href="/"> <h4><span style="color:#379237">H</span>ealthify<h4>
     </a>

    </div>

    <div class="left-div-menu">
        
        <ul class="menu">

         <a href="#">
          
            <li>  
                <div class="item">
                <img class="logo"src="../img/profilepic2.png"/>
                <h6> <a href="#">  Profile</a>  <h6>
                </div>
          </li></a>


         <a href="#"><li>
            <div class="item">
                <img class="logo"src="https://www.svgrepo.com/show/233648/diet-vegan.svg"/>
                
              <h6> <a href="{{route('showDiet')}}">  Current Diet</a>  <h6>
                </div>
                

         </li></a>

         <a href="#"><li>
                 
            <div class="item">
                <img class="logo"src="https://www.svgrepo.com/show/233662/diet-vegan.svg"/>
               
                    <h6> <a href="#"> Diet History</a>  <h6>
                </div>

         </li></a>

        </ul>


    </div>





</div>

<livewire:profile-update :user="$user" />





    
</body>
</html>
@endsection