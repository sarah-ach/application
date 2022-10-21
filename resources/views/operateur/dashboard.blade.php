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


   




<div class="container-fluid ">
    <!-- navigation bar !-->
<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..."  width="200" height="100"/></a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    

                   @if (session('status'))
                       
                     {{ session('status') }}
                       
                        <li class="nav-item"> <a class="nav-link " aria-current="page" href="/admin/home">Importer</a></li>
                    <li class="nav-item"> <a class="nav-link active" href="/wires">Vérification Circuit</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/admin/exporter">Exporter</a></li>
                    <li class="nav-item"> <a class="nav-link " href="/admin/ajouter">Ajouter Opérateur</a></li>
                   
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Operator</a></li>
                        
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
            <p class="card-text"> @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello opérateur, You are logged in!') }}</p>
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
            <form method="POST" action="{{url('/wires')}}">
            {{ csrf_field() }}
            <div class="input-group">
              
              <div class="row justify-content-center">
       
              <!-- <textarea class="card-text" name="username">{{ Auth::user()->username }}</textarea> -->
<div class="media-body">
            <p class="card-text">{{ Auth::user()->username }}</p>
          </div>
              <input type="search" id="wireName" name="search" class="form-control @error('search') is-invalid @enderror" placeholder="Circuit" style="width: 16rem;" />
                @error('circuit')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group mt-4">

            <div class="input-group">
            
            <div class="mycard m-1 p-1 mt-4 "  >
                <textarea id="location" type="text" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="width: 16rem;" placeholder="Location">
                </textarea>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            </div>

            <div class="input-group mt-4">

                <input style="width: 16rem;"  id="scan_loc" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Scan-location">

            </div>
              
            
          <div class="form-group mt-4">
            <div class="input-group">
              <input style="width: 16rem;"  type="text" class="form-control" placeholder="Numéro de série" name="serie" id="serie" required><br>
              
            </div>
           
          </div>
            </div>
          </div>

         
    </div>




          
    
          <div class="row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
        </form>
        </div>
    </div>
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
                <th>Quantité</th>
                <th>Date</th>
             
              </tr>
            </thead>
            <tbody>
            @foreach($Historique as $his)
            <tr>
                <td>{{ $his->search }}</td>
                <td>{{ $his->password }}</td>
                <td>{{ $his->quantite}}</td>
                <td>{{ $his->dateOperation }}</td>
            </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


<script>
    $(document).ready(function () {
        $('#wireName').on('keyup', function(){
            var value = $(this).val();
            
             $.ajax({
                type: "get",
                url: "/wires",
                data: {'search':value},
                success: function (data) {
                    $('.form-control').html(data);
                   //console.log(data);
                  
                }
            }); 
        });
    });
</script>

@extends('layouts.footer')
