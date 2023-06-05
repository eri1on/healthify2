@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="{{asset('/css/dashboard-usersDiet.css')}}">
</head>
<body>
    @php
    $user = auth()->user();
@endphp
@if($user && ($user->is_superadmin || $user->is_admin))
<div class="top-div">
    <table>

<thead>
   
    <th>SignUp-ID</th>
    <th>Diet-ID</th>
    
</thead>
<tbody>
    @foreach($allUsersDiets as $diet)
   
    <tr>
   
    <td>{{$diet->fk_signUp_id}}</td>

    <td>{{$diet->diet_id}}</td>
    <td> <a href="{{route('adminEditDiet',['id' => $diet->diet_id, 'userId' => $diet->fk_signUp_id])}}"><button class="btn btn-primary">Edit Diet</button> </a>    </td>
    <td>
    <form method="POST" action="{{route('deleteUserDiet',$diet->diet_id)}}" onsubmit="return confirm('Are you sure you want to delete this diet?');">
       @method('DELETE')
       @csrf
     <button type="submit" class="btn btn-danger">Delete Diet</button>
     
    </form>

    </td>
    </tr>
    @endforeach
</tbody>


    </table>
</div>
   
    
    @endif
</body>
</html>
@endsection