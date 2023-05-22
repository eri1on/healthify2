
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User info</title>
    <link rel="stylesheet" href="{{asset('css/user-info.css')}}">
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

    <table>
    <thead>
   <tr>
   <th>Name</th>
   <th>Email</th>
   <th>Age</th>
   <th>Gender</th>
   <th>Height</th>
   <th>Weight</th>
   <th>Goal</th>
   <th>Activity</th>
   <th>Is_Admin</th>
   <th>Is_SuperAdmin</th>

   </tr>

    </thead>
<tbody>

    @foreach($users as $user)
<tr>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->age}}</td>
<td>{{$user->gender}}</td>
<td>{{$user->height}}</td>
<td>{{$user->weight}}</td>
<td>{{$user->goal}}</td>
<td>{{$user->activity}}</td>
<td>{{$user->is_admin}}</td>
<td>{{$user->is_superadmin}}</td>
<td><a href="{{route('admin-user-edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
<td>
 <form action="{{route('admin-user-delete',$user->id)}}" method="POST" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
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