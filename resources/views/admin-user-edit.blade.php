
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link rel="stylesheet" href={{asset('css/admin-user-edit.css')}}>
</head>
<body>

    <livewire:admin-user-edit :userId="$user->id" />


</body>
</html>

@endsection