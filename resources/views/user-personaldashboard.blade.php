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



<div class="right-div">

<!--
<div class="right-div-title">
    
<h4 class=" title-h4">Good Evening, CQQ!</h4>
<p class="title-p">Hope you are having a great time using our webapp</p>

</div>


-->




  <form  class="main-form" method="POST" action="{{ route('profile.update') }}" onsubmit=" return userProfileInfoValidation();">
        @csrf
        @method('PATCH')
        <div class="t">
            
            <h3 class="h5">Profile Update</h3>
        
            </div>
    
    
        <div class="form-update">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-input @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-update">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-update">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
           
        <div class="form-update">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        
        <div class="form-update">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="{{ old('age', $user->age) }}" class="form-input @error('age') is-invalid @enderror">
            @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-update">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-input">
                <option value="">Select gender </option>
                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select><br>
            @error('gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        
        <div class="form-update">
            <label for="height">Height:</label>
            <input type="number" id="height" name="height" value="{{ old('height', $user->height) }}" class="form-input"><br>
            @error('height')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-update">
            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" value="{{ old('weight', $user->weight) }}" class="form-input"><br>
            @error('weight')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
    
        <div class="form-update">
            <label for="goal">Goal:</label>
            <select id="goal" name="goal" class="form-input">
                <option value="">-- Select Your Goal --</option>
                <option value="lose_weight" {{ $user->goal == 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
                <option value="gain_weight" {{ $user->goal == 'gain_weight' ? 'selected' : '' }}>Gain Weight</option>
            </select><br>
            
            @error('goal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        
        <div class="form-update">
            <label for="activity">Activity:</label>
            <select id="activity" name="activity" class="form-input">
                <option value="">-- Select Activity --</option>
                <option value="low_activity" {{ $user->activity == 'low_activity' ? 'selected' : '' }}>Low Activity</option>
                <option value="high_activity" {{ $user->activity == 'high_activity' ? 'selected' : '' }}>High Activity</option>
            </select><br>
            
            @error('activity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div id="errorDiv" style="color:red"></div>
        </div>
    
        <div class="form-update-btn">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </form>





</div>









</div>


    
@push('scripts')
<script src="{{ asset('js-Validations/user-profile-info-validation.js') }}"></script>
@endpush

@stack('scripts')
    
</body>
</html>
@endsection