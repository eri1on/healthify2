@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/add-recipes.css') }}">
    @livewireStyles
</head>
<body>

    <livewire:add-recipes />




    @livewireScripts
</body>
</html>
@endsection
