<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <style>
     .div-btn{
        width:100%;
         display:flex;
          justify-content:flex-end;
           align-items:center;
           color:#EEEDED;
     
         
          
          

     }
     .div-btn a{
   font-size: small;
   font-family: Nunito,sans-serif;
   color:#000000E6;
   margin-right:45px;

     }

     .div-btn a:hover{
        color:#468B97;
     }

     .start-a{
        width:100%;
        display: flex;
        align-items: center;
        justify-content: center;
        
     }

     .start-a a{
        font-size: medium !important;
     }
    
    

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthify</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container" style="max-width:100% !important;">

               
                <a class="navbar-brand" href="{{ url('/') }}">
                    
                  <!--  <img class="logo" src="../img/Healthify_LOGO.png"> -->
                    <span style="color:rgb(42, 230, 42)">H</span>ealthify
                
                </a>
               
                <div class="div-btn" >
                    @if(Auth::user()&&Auth::user()->is_admin || Auth::user()&&Auth::user()->is_superadmin) 
 
                      @if(\Request::route()->getName() !='dashboard')
                         <a class="navbar-brand" href="{{route('dashboard')}}">Dashboard</a>
                      @endif

                    @endif 

                    @guest
                  

                      @if(\Request::route()->getName() == 'index')
                      <div class="start-a">
                          <a class="navbar-brand" href="{{ route('myDiet') }}">START NOW</a>
                      </div>
                      @endif

                    @else

                       <a class="navbar-brand" href="{{ route('userprofileshow') }}">Profile</a>
                        

                 @if(\Request::route()->getName() != 'showDiet')
                    <a  class="navbar-brand" href="{{route('showDiet')}}">My Diet</a>
                 @endif


                 @if(\Request::route()->getName()!='myDiet')
                 <a  class="navbar-brand" href="{{route('myDiet')}}">Services</a>
                 @endif

                 @if(\Request::route()->getName()!='recipes')
                   <a  class="navbar-brand" href="{{route('recipes')}}">Recipe and Tips</a>
                 @endif
                 
                   <a  class="navbar-brand" href="{{route('index')}}" >Blog</a>
                   <a  class="navbar-brand" href="{{route('index')}}" >FAQ</a>

                   @if(\Request::route()->getName()!='contactUs')
                   <a  class="navbar-brand" href="{{route('contactUs')}}">Contact Us</a>
                   @endif

                 @endguest

                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                   
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                 
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                @php
                                $user=Auth::user();

                            @endphp
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="{{ route('showDiet') }}">My Diet</a>
                                    <a class="dropdown-item" href="{{ route('userprofileshow') }}">Profile</a>

                                   

                                    @if($user->is_admin ||$user->is_superadmin)
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                       
                                    @endif


                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                  
                        

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
