<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lear</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        @extends('layouts.style')

      <style>
        .scrollable
        {
          height:500px;
          overflow:scroll;
        }

        .btn {padding:10px 24px;}
      </style>

    </head>


    <!-- body part -->

    <body>
@if (Route::has('login'))
          
          @auth   
  <div class="container-fluid">
    <!-- navigation bar !-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..."  width="200" height="100"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                    <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Verification Circuit
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/admin/home">Importer</a></li>
                        <li><a class="dropdown-item" href="/admin/posts">Posts</a></li>
                        <li><a class="dropdown-item" href="/admin/exporter">Exporter</a></li>
                        <li><a class="dropdown-item"  hr ef="/admin/ajouter">Ajouter Opérateur</a></li>
                      </ul>
                    </li> -->

                    <li class="nav-item"> <a class="nav-link " href="/operateur/dashboard">Vérification Circuit</a></li>
                   
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/iocard">Scanner IO card</a></li>
                    

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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Ajouter') }}</a>
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

       
        <!--content page !-->


        <div class="container-fluid vh-200" style="margin-top:100px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-lg-9 shadow-lg p-5 bg-light ">
                    
                        <div class="text-center" >
                            <h3  style="color:#ff0021;">SCAN IOD CARD</h3>
                        </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="form-inline">
                        @csrf
                        
                        <div class="row mb-3">
                            
                        <form method="POST" action="{{ route('register') }}" class="form-inline">
                        @csrf
                        
                        <div class="row mb-3">
                            
                            <label for="username" class="col-md-2 col-form-label text-md-end">{{ __('QR Code:') }}</label>

                            <div class="col-md-9">
                            <div class="form-outline mb-4">
                            <textarea class="form-control" id="QR" rows="3"></textarea>

                            </div>
                                @error('QR')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             

                            
                        </div>
                        <div class="col-md-12 ">
                            <!-- spacing for button center -->
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-default btn-md-4 btn-block " type="reset">
                                    {{ __('Effacer') }}
                            </button>
                            </div>
                        </div>
                       
                        
    </form> 
                    </form>
                    
                    

                </div>
                
            </div>
        </div>
    </div>
</div>



        @else
<!-- Responsive navbar-->
<div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Verification App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Dashbord</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Operator</a></li>
                        @endauth
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
            <div class="text-center my-5">
                <img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..." />
                <h1 class="text-white fs-3 fw-bolder">Full Width Pics</h1>
                <p class="text-white-50 mb-0">Landing Page Template</p>
            </div>
        <!-- </header> -->
        
       

<div>

      <nav class="navbar navbar-white bg-white">
      <form class="container-fluid justify-content-start">
          @if (Route::has('login'))
          
          @auth

          <a href="{{ url('/login') }}" ><button class="btn btn-default btn-lg me-4 position-absolute top-50 start-50" type="button">Dashbord</button></a>
          @else
          <a href="{{ url('/login') }}" ><button type="button" class="btn btn-default btn-lg me-4 position-absolute top-50 start-50"> Admin</button></a>
          <!--<a href="{{ url('/login') }}" > <button class="btn btn-outline-danger me-4" type="button">Admin</button></a>!-->
          <a href="{{ url('/login') }}" > <button type="button" class="btn btn-default btn-lg me-4 position-absolute buttom-50 end-50"> Opérateur</button></a>

            <!-- @if (Route::has('register'))
            <a href="{{ url('/login') }}" > <button class="btn btn-outline-danger me-4" type="button">Opérateur</button></a>
            @endif !-->
          @endauth
          @endif
      </form>
      </nav>
                        
                        @endauth
                    @endif
                    @extends('layouts.footer')

        <main class="py-4 mt-2 col-md-12">
            @yield('content')
        </main>
        </div>
        </body>
</html>