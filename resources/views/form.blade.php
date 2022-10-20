<!DOCTYPE html>
<html>
<head>
<title>Laravel 9 Form Validation</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container mt-4">
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="card">
<div class="card-header text-center font-weight-bold">
<h2>Laravel 9 Form Validation</h2>
</div>
<div class="card-body">
<form name="employee" id="employee" method="post" action="{{url('store-form')}}">
{{ csrf_field() }}
<div class="form-group">
<label for="exampleInputEmail1">Circuit</label>
<input type="text" id="circuit" name="circuit" class="@error('circuit') is-invalid @enderror form-control">
@error('circuit')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>        
<div class="form-group">
<label for="exampleInputEmail1">Location</label>
<input type="text" id="location" name="location" class="@error('location') is-invalid @enderror form-control">
@error('location')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>        
<div class="form-group">
<label for="exampleInputEmail1">Scan Location</label>
<input type="text" id="scan" name="scan" class="@error('scan') is-invalid @enderror form-control">
@error('scan')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>        
<div class="form-group">
<label for="exampleInputEmail1">Num série</label>
<input type="text" id="serie" name="serie" class="@error('serie') is-invalid @enderror form-control">
@error('serie')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>  






<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


<script>
    $(document).ready(function () {
        $('#circuit').on('keyup', function(){
            var value = $(this).val();
            
            /*  $.ajax({
                type: "get",
                url: "/form",
                data: {'search':value},
                success: function (data) {
                    //$('.mycard').html(data);
                   console.log(data);
                }
            });  */

            if(value=="") {
                $('#location').html("");
                
            }
            else
            {
               $.get("{{URL::to('wire')}}",{value:'search'},function(data)
               {
                $('#location').empty().html(data);
                $('#location').show();
               } )
              
               
            }



        });
    });
</script>


</body>
</html>