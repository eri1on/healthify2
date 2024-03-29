@extends('layouts.app')

@section('content')
@livewireStyles
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                 
                    <livewire:login-validation />
                </div>
            </div>
        </div>
    </div>
</div>


@livewireScripts
@endsection
