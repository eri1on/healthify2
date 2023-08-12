@extends('layouts.app')
<script src="/js-Validations/signup-validation.js"></script>
@section('content')
@livewireStyles
<div class="container">
    <livewire:signup-validation />

</div>


@livewireScripts
@endsection


