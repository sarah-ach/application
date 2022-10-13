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
    </head>


   


    <!-- navigation bar !-->
    <body>
    @if (Route::has('login'))
          
          @auth  
  <div class="container-fluid ">
    <!-- navigation bar !-->
<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..."  width="200" height="100"/></a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                        <li class="nav-item"> <a class="nav-link " aria-current="page" href="/admin/home">Importer</a></li>
                    <li class="nav-item"> <a class="nav-link active" href="/wires">Vérification Circuit</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/admin/exporter">Exporter</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/admin/ajouter">Ajouter Opérateur</a></li>
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
 

        <!--content!-->

        <div class="row container-fluid mt-4">
  
 
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Alimentation de circuit</h4>
        <div class="media">
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
          <div class="media-body">
            <p class="card-text">Il faut scanner l'emplacement de circuit</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Numéro de Post</h4>
        <div class="media">
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-center mr-3"></i>
          <div class="media-body">
            <p class="card-text">{{ Auth::user()->post }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Matricule</h4>
        <div class="media">
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-end mr-3"></i>
          <div class="media-body">
            <p class="card-text">{{ Auth::user()->username }}</p>
          </div>
        </div>
      </div>
    </div>
  

  
 
</div>


  


 
  <div class="row">
  <div class="col-lg-6 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title ">Opération</h4>
        
        <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper" onload="document.pos.barcode.focus();">
        
          <div class="form-group mt-4">
            <div class="input-group-append">
              <form class="pos-style" name="pos" action="" method="GET">
              <input type="text" name="wire_name" class="form-control" placeholder="Circuit"><br>
              <input input type="hidden" name="scanlabel">{{request()->query('wire_name')}}</input>
              </form> 
              <div class="input-group-append">
              
              <!-- <input type="hidden" name="barcode" class="form-control" value="$barcode"> -->
               
              </div>
            </div>
          </div>



          <div class="form-group mt-4">
            <div class="input-group-append">
              
              <div class="input-group">
              <input type="text" name="barcode" class="form-control" placeholder="Location">
              </div>
            </div>
          </div>
          <div class="form-group mt-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Scan Emplacement">
             
            </div>
          </div>

          <div class="form-group mt-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Numéro de série">
              
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <!-- <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label> -->
            </div>
          </div>
          <div class="form-group">
            <!-- <button class="btn btn-primary submit-btn btn-block">Register</button> -->
          </div>
          <div class="text-block text-center my-3">
            <!-- <span class="text-small font-weight-semibold">Already have and account ?</span>
            <a href="{{ url('/user-pages/login') }}" class="text-black text-small">Login</a> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Donnée de circuit</h4>
       
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
                <th>Circuit</th>
                <th>Emplacement</th>
                <th>Date</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Jacob</td>
                <td>Photoshop</td>
                <td class="text-danger"> {{$Ldate=date('Y-m-d');}}<i class="mdi mdi-arrow-down"></i>
                </td>
                
              </tr>
              <tr>
                <td>Messsy</td>
                <td>Flash</td>
                <td class="text-danger"> {{$Ldate=date('Y-m-d');}}<i class="mdi mdi-arrow-down"></i>
                </td>
                
              </tr>
              <tr>
                <td>John</td>
                <td>Premier</td>
                <td class="text-danger"> {{$Ldate=date('Y-m-d');}}<i class="mdi mdi-arrow-down"></i>
                </td>
                
              </tr>
              <tr>
                <td>Peter</td>
                <td>After effects</td>
                <td class="text-success"> {{$Ldate=date('Y-m-d');}} <i class="mdi mdi-arrow-up"></i>
                </td>
                
              </tr>
              <tr>
                <td>Dave</td>
                <td>53275535</td>
                <td class="text-success"> {{$Ldate=date('Y-m-d');}} <i class="mdi mdi-arrow-up"></i>
                </td>
             
              </tr> 
            </tbody>
          </table>
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



  
</body>

@extends('layouts.footer')