<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __(" ") }}
                    <div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
     
    </div>
    <div class="col">
    <h1>Users </h1>
    <a href="{{url('/ajoo')}}" class="btn btn-primary">ADD User</a>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<br>
<br>
<div class="container text-center">
  <div class="row align-items-start">
      
  <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                    
                                    </tr>
                                    </thead>
                                <tbody>
                                @foreach ($users as $item)
                                <tr>
                                
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->usertype}}</td>
    <td> <a onclick="return confirm('Are you sur to delete this')"href="{{url('delete_user',$item->id)}}" class="btn btn-danger">Delete</a>
    </td>
    <td>{{$item->stock_plant_tic_tool}}</td>
</tr>
@endforeach
</tbody>
</table>
    </div>
  </div>                  


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
