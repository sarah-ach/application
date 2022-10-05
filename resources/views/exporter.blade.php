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
                    <li class="nav-item"> <a class="nav-link " href="/circuit">Vérification Circuit</a></li>
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
          <h5>Post 01</h5>
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
        <p class="mb-0 text-right">Séléctioner le type de fichier</p>
            <div class="fluid-container">
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Toutes
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="">Toutes</a></li>
                    <li><a class="dropdown-item" href="">Matricule number</a></li>
                </ul>
                
              </div>
             
            </div>
            <p class="mb-0 text-right">Date:</p>
            <div class="fluid-container">
              
             
              <div  id="date-picker" class="md-form md-outline input-with-post-icon datepicker" style="width:150;" inline="true">
                <input placeholder="select date" type="text"  class="form-control">
                <i class="fas fa-calendar input-prefix"></i>

              </div>
            </div>
            <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
               <label class="form-check-label">
                 <input type="checkbox" class="form-check-input" checked>Circuit non scannée </label>  
            </div>
          </div>
          <div class="form-group">
             <button class="btn btn-default  submit-btn btn-block">Importer</button> 
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
            <p class="card-text">1234</p>
          </div>
        </div>
      </div>
    </div>
    

  
 
</div>


  <div class="col-lg-6 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Hoverable Table</h4>
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
                <th>Circuit</th>
                <th>Emplacement</th>
                <th>Date</th>
                <!-- <th>Status</th> -->
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

  
</body>

@extends('layouts.footer')