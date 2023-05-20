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

<form class="main-form" method="POST" action="{{ route('foods.store') }}" onsubmit=" return validateForm();">
    @csrf
    <h5>Add Food</h5>
    <div class="field-div">
        <label for="nameOfFood">Food Name:</label>
        <input type="text" id="nameOfFood" name="nameOfFood" class="form-input @error('nameOfFood') is-invalid @enderror">
        @error('nameOfFood')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="field-div">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" class="form-input @error('category') is-invalid @enderror">
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="field-div">
        <label for="proteins">Proteins:</label>
        <input type="text" id="proteins" name="proteins" class="form-input @error('proteins') is-invalid @enderror">
        @error('proteins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="vitamins">Vitamins:</label>
        <input type="text" id="vitamins" name="vitamins" class="form-input @error('vitamins') is-invalid @enderror">
        @error('vitamins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="calories">Calories:</label>
        <input type="text" id="calories" name="calories" class="form-input @error('calories') is-invalid @enderror">
        @error('calories')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="field-div">
        <label for="carbohydrates">Carbohydrates:</label>
        <input type="text" id="carbohydrates" name="carbohydrates" class="form-input @error('carbohydrates') is-invalid @enderror">
        @error('carbohydrates')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div id="errorDiv" style="color:red"></div>
    
    <div class="field-div-btn">
        <button type="submit" class="btn btn-primary">
            {{ __('Add Food') }}
        </button>
    </div>


    </form>
    <script src="/js-Validations/add-food-validation.js"></script>
</body>
</html>
@endsection