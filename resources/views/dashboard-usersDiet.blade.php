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
    
</body>
</html>
@endsection