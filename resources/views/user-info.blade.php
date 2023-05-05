
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


    <table>
    <thead>
   <tr>
   <th>ID</th>
   <th>Name</th>
   <th>Email</th>
   <th>Age</th>
   <th>Gender</th>
   <th>Height</th>
   <th>Weight</th>
   <th>Goal</th>
   <th>Activity</th>
   <th>Is_Admin</th>

   </tr>

    </thead>
<tbody>

    @foreach($users as $user)
<tr>
<td>{{$user->id}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->age}}</td>
<td>{{$user->gender}}</td>
<td>{{$user->height}}</td>
<td>{{$user->weight}}</td>
<td>{{$user->goal}}</td>
<td>{{$user->activity}}</td>
<td>{{$user->is_admin}}</td>
</tr>
@endforeach
</tbody>
    </table>
    
</body>
</html>
@endsection