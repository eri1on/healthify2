@php
    $user = auth()->user();
@endphp
@if($user && ($user->is_superadmin || $user->is_admin))
<form class="main-form" method="POST" action="{{ route('foods.store') }}" wire:submit.prevent="addFoodSubmit">
    @csrf
    <h5>Add Food</h5>
    <div class="field-div">
        <label for="nameOfFood">Food Name:</label>
        <input wire:model="nameOfFood" type="text" id="nameOfFood" name="nameOfFood" class="form-input @error('nameOfFood') is-invalid @enderror">
        @error('nameOfFood')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="field-div">
        <label for="category">Category:</label>
        <input wire:model="category" type="text" id="category" name="category" class="form-input @error('category') is-invalid @enderror">
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="field-div">
        <label for="proteins">Proteins:</label>
        <input wire:model="proteins" type="text" id="proteins" name="proteins" class="form-input @error('proteins') is-invalid @enderror">
        @error('proteins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="vitamins">Vitamins:</label>
        <input wire:model="vitamins" type="text" id="vitamins" name="vitamins" class="form-input @error('vitamins') is-invalid @enderror">
        @error('vitamins')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="field-div">
        <label for="calories">Calories:</label>
        <input wire:model="calories"type="text" id="calories" name="calories" class="form-input @error('calories') is-invalid @enderror">
        @error('calories')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="field-div">
        <label for="carbohydrates">Carbohydrates:</label>
        <input wire:model="carbohydrates" type="text" id="carbohydrates" name="carbohydrates" class="form-input @error('carbohydrates') is-invalid @enderror">
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
    @else
    <div class="alert alert-danger">
        Unauthorized access! Only admins and superadmins can access this page.
    </div>
    
@endif