@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif



    @php
    $user = auth()->user();
@endphp
@if($user && ($user->is_superadmin || $user->is_admin))
  <table class="food-table">
   <thead>

    <tr>
        <th>Food Id</th>
        <th>Name Of Food</th>
        <th>Category</th>
        <th>Proteins</th>
        <th>Vitamins</th>
        <th>Calories</th>
        <th>Carbohydrates</th>
    </tr>
   </thead>
   <tbody>
    @foreach($allFoods as $food) 
    <tr>
        <td>{{$food->food_id}}</td>
        <td>{{$food->nameOfFood}}</td>
        <td>{{$food->category}}</td>
        <td>{{$food->proteins}}</td>
        <td>{{$food->Vitamins}}</td>
        <td>{{$food->calories}}</td>
        <td>{{$food->Carbohydrates}}</td>
        <td> <a href="{{route('admin-food-edit',$food->food_id)}}" class="btn btn primary">Edit </a></td>
        <td> <form action="{{route('admin-food-delete',$food->food_id)}}" method ="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
             </form>

       </td>
    </tr>
    @endforeach
   </tbody>
  </table>
 

  @else
  <div class="alert alert-danger">
      Unauthorized access! Only admins and superadmins can access this page.
  </div>
  
@endif


</body>
</html>
@endsection