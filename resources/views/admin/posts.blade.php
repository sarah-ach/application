<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lear</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
        <link href="https://fonts.googleapis.com/css?family=Coda|Open+Sans" rel="stylesheet"> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>



        @extends('layouts.style')

        <style>
          
        </style>
        <script type="text/javascript">

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

jQuery(document).ready(function($) {
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });


        </script>
    </head>


   




<div class="container-fluid ">
    <!-- navigation bar !-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{asset('img/img1.jpg')}}" alt="..."  width="200" height="100"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    @if (Route::has('login'))
          
                   @auth

                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Verification Circuit
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/admin/home">Importer</a></li>
                        <li><a class="dropdown-item" href="/admin/posts">Posts</a></li>
                        <li><a class="dropdown-item" href="/admin/exporter">Exporter</a></li>
                        <li><a class="dropdown-item"  href="/admin/ajouter">Ajouter Opérateur</a></li>
                      </ul>
                    </li>

                    <li class="nav-item"> <a class="nav-link " aria-current="page" href="/admin/IocardAdmin">Scanner IO card</a></li>
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
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-star
           t mr-3"></i>
          <div class="media-body">
            <p class="card-text"> @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{ __('Bonjour Administrateur!') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card" >
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter un post</h4>
        <div class="media">
          <i class="mdi mdi-earth icon-md text-info d-flex align-self-center mr-3"></i>
          <div class="media-body">
          <button class="btn btn-success btn-rounded " style="margin-right: 1rem" data-bs-toggle="modal" data-bs-target="#ModalAjouter">Ajouter</button>
           
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



  
  <div class="col-lg-6 grid-margin stretch-card mt-4" style=" margin-left: auto;
  margin-right: auto;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Données de post </h4>
       
        <div class="table-responsive">
        @csrf
          <table class="table table-hover" id="empTable" >
            <thead>
            <tr>
            
                <th>Nom Post</th>
                <th>Matricule Opérateur</th>
                <th>Date</th>
                <th>Action</th>
             
              </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
           
                
                <td> {{$post->nomP}}</td>
                <td> {{$post->OperMatricule}}</td>
                <td> {{$post->Date}}</td>
                
                <td>
                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#Modalmodifier"  data-id='{{ $post->id }}'  class="btn btn-info viewdetails" >
                                                Edit
                                            </button> -->
                <form method="GET" action="{{url('admin/posts' . '/' .$post->id)}}" accept-charset="UTF-8" style="display:inline">
                @csrf
                @method('delete')
               <button class="btn btn-danger btn-rounded " type="submit" title="Delete post" onclick="return confirm('confirmer la suppression?')"><i class="fa fa-trash-o" aria-hidden="true"></i>Supprimer</button></form> </td>
                
            </tr>

            
            
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>



<!-- Modal -->
<div class="modal fade" id="ModalAjouter" tabindex="-1" aria-labelledby="ModalAjouter" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="{{url('admin/posts')}}" method="POST">
          
          {!!csrf_field()!!}
        <h5 class="modal-title" id="ModalAjouter">Ajouter un Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style=" margin-left: auto;
  margin-right: auto;">
      <label>Nom Post:</lable>
      <input type="text" class="form-control" id="post" name="nomP"/>
      <label>Matricule Opérateur:</label>
      <select name="OperMatricule" id="OperMatricule" class="form-control">
                @foreach($User as $us)
                    <option>{{$us->username}}</option>
                    @endforeach
                </ul>
  </select>  
              
              
  
      <label>Date:</label>
      <input type="date" class="form-control" id="dob" name="Date">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
        <input type="submit" value="Ajouter" class=" btn btn-success">
      </div>
    </div>
  </div>
  </form>
</div>


          


<!-- Modal -->
<div class="modal fade" id="Modalmodifier" tabindex="-1" aria-labelledby="Modalmodifier" aria-hidden="true">
         <div class="modal-dialog">

            <!-- Modal content-->
            <!-- <div class="modal-content">
               <div class="modal-header">
               <form class="app-form" action="admin/posts/{id}" method="POST">
  <input class="editID" type="hidden" name="editID" value="">
  <div class="form-group">
    <label for="company">Company:</label>
    <input type="text" name="nomP" value="">
  </div>

  <div class="form-group">
    <label for="month">From:</label>
    <input type="text" name="OperMatricule" value="">
  </div>

  <div class="form-group">
    <label for="to">To:</label>
    <input type="text" name="Date" value="">
  </div>
  <div class="row">
    <div class="col-sm-6">
      <input type="submit" class="btn btn-primary profile-form-btn" value="Save Changes">
    </div>
  </div>
</form>

</div> -->

<!-- <script type='text/javascript'>
   $(document).on("click", "viewdetails", function() {
  var id = $(this).val();  
  url = "/admin/posts/"+id;
  $.ajax({
    url: url,
    method: "get"    
  }).done(function(response) {
    //Setting input values
    $("input[name='nomP']").val(nomP);
    $("input[name='OperMatricule']").val(OperMatricule);
    $("input[name='Date']").val(Date);
    

    //Setting submit url
    $("modal-form").attr("action","/admin/posts/"+id)
  });
});
   </script> -->




@extends('layouts.footer')

<main class="py-4 mt-2 col-md-12">
            @yield('content')
        </main>
        @extends('layouts.footer')
        </div>
</body>
</html>
