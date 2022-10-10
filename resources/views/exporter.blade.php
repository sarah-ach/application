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
      

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        


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

                        <li class="nav-item"> <a class="nav-link " aria-current="page" href="/home">Importer</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/wires">Vérification Circuit</a></li>
                    <li class="nav-item"> <a class="nav-link active " href="/exporter">Exporter</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/ajouter">Ajouter Opérateur</a></li>
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
        <h4 class="card-title">Exportation de donnée</h4>
        <div class="media">
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
          <div class="media-body">
          <h5>{{ Auth::user()->status }}</h5>
          <h5>{{ Auth::user()->post }}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
      <h4 class="card-title">Filtrer</h4>
        <div class="media">
        <p class="mb-2 text-right"></p>
            <div class="fluid-container">
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Choisir le fichier
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="">Toutes</a></li>
                    <li><a class="dropdown-item" href="">Matricule number</a></li>
                </ul>
                
              </div>&nbsp;&nbsp;
             
            </div>
            <p class="mb-0 text-right">Date:</p>
            <div class="fluid-container">

            <form>
            <div class="row form-group">
                
                <div class="col-sm-12">
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i> 
                            </span>
                        </span>
                    </div>
                    <label class="form-check-label">
                 <input type="checkbox" class="form-check-input" checked>Circuit non scannée </label>  
                </div>
            </div>
        </form>


            </div>
            <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
            <div class="form-group">
          <form action="{{ route('splices.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                  &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-dark  float-begin btn-rounded">Filtrer</button> <br>
                 <a class="btn btn-success float-end btn-rounded" href="{{ route('splices.export') }}">Exporter</a>
                 
            </form>
             
          </div>
            </div>
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


  <div class="col-lg-12 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Hoverable Table</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
                <th>MatriculeOpérateur</th>
                <th>WireName</th>
                <th>Location</th>
                <th>SerialNumber</th>
                <th>DateOperation</th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Jacob</td>
                <td>Photoshop</td>
                <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                </td>
                <!-- <td>
                  <label class="badge badge-danger">Pending</label>
                </td> -->
              </tr>
              <tr>
                <td>Messsy</td>
                <td>Flash</td>
                <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i>
                </td>
                <!-- <td>
                  <label class="badge badge-warning">In progress</label>
                </td> -->
              </tr>
              <tr>
                <td>John</td>
                <td>Premier</td>
                <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i>
                </td>
                <!-- <td>
                  <label class="badge badge-info">Fixed</label>
                </td> -->
              </tr>
              <tr>
                <td>Peter</td>
                <td>After effects</td>
                <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i>
                </td>
                <!-- <td>
                  <label class="badge badge-success">Completed</label>
                </td> -->
              </tr>
              <tr>
                <td>Dave</td>
                <td>53275535</td>
                <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i>
                </td>
                <!-- <td>
                  <label class="badge badge-warning">In progress</label>
                </td> -->
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

                    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>

</body>




@extends('layouts.footer')