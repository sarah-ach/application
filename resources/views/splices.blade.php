
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Import Export Excel & CSV File to Database Example - LaravelTuts.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Laravel 9 Import Export Excel & CSV File to Database Example - LaravelTuts.com</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('splices.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
            </form>
  

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
                    <th colspan="3">
                        List Of Users
                        <a class="btn btn-danger float-end" href="{{ route('splices.export') }}">Export User Data</a>
                    </th>
                </tr>
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
            @foreach($splices as $splice)
            <tbody>
              <tr>
                
                <td> {{ $splice->wire_name }}  </td>
                <td>
                {{ $splice->CSA }}
                </td>
                <td> {{ $splice->color1 }} </td>
                <td class="text-danger"> {{ $splice->color2 }}  <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{ $splice->length }}  </td>
                <td class="font-weight-medium">{{ $splice->terminal_A }} </td>
                <td> {{ $splice->seal_A }} </td>
                <td>
                {{ $splice->joint_to_A }}
                </td>
                <td> {{ $splice->cavity_A }}  </td>
                <td class="text-danger"> {{ $splice->terminal_B }}  <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> {{ $splice->seal_B }}  </td>
                <td class="font-weight-medium"> {{ $splice->joint_to_B }} </td>
                <td> {{ $splice->cavity_B }} </td>
                <td>
                {{ $splice->bundle_size }}
                </td>
                <td>{{ $splice->kanban_location }}</td>
                <td class="text-danger"> {{ $splice->workstation }}<i class="mdi mdi-arrow-down"></i>
                </td>
                <td class="font-weight-medium">{{ $splice->location }} </td>
                <td> {{ $splice->module }} </td>
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


  
        </div>
    </div>
</div>
     
</body>
</html>