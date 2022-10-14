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

    
      </style>

    </head>


 

<body>

 <!-- navigation bar !-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..."  width="200" height="100"/></a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/admin/home">Importer</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/wires">Vérification Circuit</a></li>
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


<div class="row mt-4 col-md-12">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h2 class="card-title mb-0">Importation de données</h2>
          <div class="wrapper d-flex">
            <div class="d-flex align-items-center mr-3">
              <span class="dot-indicator bg-success"></span>
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello ADMINISTRATOR, You are logged in!') }}
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2 col-md-12">

       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card  mt-2 col-md-12">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
         
            <p class="mb-0 text-left">La dérnier mis à jour</p>
            <div class="fluid-container">
                       
            <i class="fas fa-calendar input-prefix" style="color:red">{{$Ldate=date('Y-m-d');}}</i>

            </div>
          
          <div class="float-right">
            <p class="mb-0 text-right">Numéro de Post</p>
            <div class="fluid-container">
                       
            <h3 class="font-weight-medium text-right mb-0">{{ Auth::user()->post }}</h3>

            
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <!-- <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales </p> -->
      </div>
    </div>
  </div> 
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card  mt-2 col-md-12">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Séléctioner le type de fichier</p>
            <div class="fluid-container">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    --please select--
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/admin/home">Circuit</a></li>
                    <li><a class="dropdown-item" href="/admin/splices">Splice</a></li>
                    
                

                </ul>
              </div>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <!-- <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales </p> -->
      </div>
    </div>
  </div> 
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card mt-2 col-md-12">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
         
          <div class="float-right">
            
            <div class="fluid-container">
              <!-- <h3 class="font-weight-medium text-right mb-0">5693</h3> -->
              <form action="{{ route('wires.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control"><br>
                <button class="btn btn-warning btn-rounded ">Importer</button>
                <br>
                
              
            </form>
             
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <!-- <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales </p> -->
          
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card mt-2 col-md-12">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-left">
          <p class="mb-0 text-left">Choisir l'action</p>
            <div class="fluid-container btn-block">
            <form action="{{ route('wires.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                  &nbsp;&nbsp;&nbsp;
                 <a class="btn btn-success float-end btn-rounded" href="{{ route('wires.export') }}">Exporter</a>
                 <a class="btn btn-danger btn-rounded" href="{{ route('wires.delete') }}">Supprimer</a> &nbsp;&nbsp;&nbsp;
            </form>

              </div>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <!-- <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales </p> -->
      </div>
    </div>
  </div>
</div>

 
</div>



<!-- table content!-->
<div class="container-fluid mt-2 col-md-12">
<div class="row">
  <div class=" container-fluid col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <div class="scrollable">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> Circuit Name</th>
                <th> CSA</th>
                <th> Color1 </th>
                <th> Color2 </th>
                <th> Length </th>
                <th> Terminal A </th>
                <th> Seal A </th>
                <th> Joint to A </th>
                <th> Cavity A </th>
                <th> Terminal B </th>
                <th> Seal B </th>
                <th> Joint to B </th>
                <th> Cavity B </th>
                <th> Bundle Size </th>
                <th> Kanban Location </th>
                <th> Workstation </th>
                <th> Location </th>
                <th> Module </th>
              </tr>
            </thead>
            @foreach($wire as $wr)
            <tbody>
              <tr>
                
                <td> {{$wr['wire_name']}}  </td>
                <td>
                {{$wr['CSA']}} 
                </td>
                <td> {{$wr['color1']}} </td>
                <td class="text-danger"> {{$wr['color2']}}  <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{$wr['length']}}  </td>
                <td class="font-weight-medium"> {{$wr['terminal_A']}} </td>
                <td> {{$wr['seal_A']}} </td>
                <td>
                {{$wr['joint_to_A']}} 
                </td>
                <td> {{$wr['cavity_A']}}  </td>
                <td class="text-danger"> {{$wr['terminal_B']}}  <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{$wr['seal_B']}}  </td>
                <td class="font-weight-medium"> {{$wr['joint_to_B']}}  </td>
                <td> {{$wr['cavity_B']}} </td>
                <td>
                {{$wr['bundle_size']}} 
                </td>
                <td> {{$wr['kanban_location']}}  </td>
                <td class="text-danger"> {{$wr['workstation']}} <i class="mdi mdi-arrow-down"></i>
                </td>
                <td class="font-weight-medium"> {{$wr['location']}} </td>
                <td> {{$wr['module']}}  </td>
              </tr>
              <tr>
               
              
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


        
       

<div>

      <nav class="navbar navbar-white bg-white">
      <form class="container-fluid justify-content-start">
          @if (Route::has('login'))
          
          @auth

          <!-- <a href="{{ url('/login') }}" ><button class="btn btn-default btn-lg me-4 position-absolute top-50 start-50" type="button">Dashbord</button></a> -->
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
                      



        <main class="py-4 mt-2 col-md-12">
            @yield('content')
        </main>
        @extends('layouts.footer')
        </div>
</body>
</html>