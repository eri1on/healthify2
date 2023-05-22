@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link rel="stylesheet" href={{asset('css/add-food.css')}}>
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@php
    $user = auth()->user();
@endphp
@if($user && ($user->is_superadmin || $user->is_admin))
<form class="main-form" method="POST" action="{{ route('admin-food-update',$food->food_id) }}" onsubmit=" return validateEditForm();">
    @csrf
    @method ('PUT')
    <h5>Edit Food</h5>
    <div class="field-div">
        <label for="nameOfFood">Food Name:</label>
        <input type="text" id="nameOfFood" name="nameOfFood" value="{{ $food->nameOfFood }}"class="form-input @error('nameOfFood') is-invalid @enderror">
        @error('nameOfFood')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="field-div">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{ $food->category }}" class="form-input @error('category') is-invalid @enderror">
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="field-div">
        <label for="proteins">Proteins:</label>
        <input type="text" id="proteins" name="proteins" value="{{ $food->proteins }}" class="form-input @error('proteins') is-invalid @enderror">
        @error('proteins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="vitamins">Vitamins:</label>
        <input type="text" id="vitamins" name="vitamins" value="{{ $food->vitamins }}" class="form-input @error('vitamins') is-invalid @enderror">
        @error('vitamins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="calories">Calories:</label>
        <input type="text" id="calories" name="calories" value="{{ $food->calories }}" class="form-input @error('calories') is-invalid @enderror">
        @error('calories')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="field-div">
        <label for="carbohydrates">Carbohydrates:</label>
        <input type="text" id="carbohydrates" name="carbohydrates" value="{{ $food->carbohydrates }}" class="form-input @error('carbohydrates') is-invalid @enderror">
        @error('carbohydrates')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div id="errorDiv" style="color:red"></div>
    
    <div class="field-div-btn">
        <button type="submit" class="btn btn-primary">
            {{ __('UPDATE') }}
        </button>
    </div>

   
    </form>
    @else
    <div class="alert alert-danger">
        Unauthorized access! Only admins and superadmins can access this page.
    </div>
    
@endif
<script src="/js-Validations/edit-food-validation.js"></script>
 
</body>
</html>
@endsection