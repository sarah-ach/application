<!-- /*home.blade.php*/ -->

 <!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('welcome!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  -->




@extends('layouts.header')
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Verification App</a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Accueil</a></li>
                    <li class="nav-item"> <a class="nav-link " href="#">Importer</a></li>
                    <li class="nav-item"> <a class="nav-link " href="#">Exporter</a></li>
                    <li class="nav-item"> <a class="nav-link " href="#">Ajouter Opérateur</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Operator</a></li>
                        @endauth
                    @endif
                    </ul>

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

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        @extends('layouts.footer')

</body>
</html>