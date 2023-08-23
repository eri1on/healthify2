@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    @php
    $user = auth()->user();
@endphp
@if($user && ($user->is_superadmin || $user->is_admin))

<div class="top-div">
<button id="nav-btn" class="btn btn-info" ><a href="{{route('userinfoshow')}}">USERS</a></button>
<br>
<button id="btn-addFood"class="btn btn-info" ><a href="{{route('showCreateFoodForm')}}">ADD FOOD</a></button>
<button id="btn-updateFood"class="btn btn-info" ><a href="{{route('dashboard-foods')}}">UPDATE FOOD</a></button>
<button id="btn-ManageDiet"class="btn btn-info" ><a href="{{route('admin-diet-dashboard')}}">Manage Diet</a></button>
<button id="btn-ManageDiet"class="btn btn-info" ><a href="{{route('addRecipesForm')}}">Add Recipe</a></button>
<button id="btn-ManageDiet"class="btn btn-info" ><a href="{{route('messagelist')}}"> Manage Messages </a></button>
</div>
@else
<div class="alert alert-danger">
    Unauthorized access! Only admins and superadmins can access this page.
</div>

@endif
</body>
</html>

@endsection
