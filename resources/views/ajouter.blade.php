<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("") }}
                    <div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
     
    </div>
    <div class="col">
    <h1>ADD User</h1>
    
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<br>
<br>
<div class="container text-center">
  <div class="row align-items-start">
      <h1></h1>
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
<ul>
@foreach($errors->all() as $error)
<li class="alert alert-danger">{{$error}}</li>
@endforeach
</ul>

                    <form action="{{url('/add_user')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-3 form-check">
                         <label for="" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" placeholder="Write name" required="">
                        </div>


                        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
                        
                      
                     

    <div class="mb-3">
                         <label for=""class="form-label">User Catagoy</label>
                       <select name="usertype" id="usertype" class="form-control"required="">
                       <option value="">Add a catagory here</option>
         
                        <option value="ba" name="">Business Analys</option>
                        <option value="admin" name="">Admin</option>
                        <option value="rh" name="">Admin RH</option>
                        <option value="vc" name="">Admin VC</option>
                        <option value="fn" name="">Admin Finance</option>
                        
                      
                       </select>  </div>


                       <div class="div_design">
                         <label for="">password</label>
                        <input type="password" class="form-control" name="password" required="">
                        </div>
                        <br>
                        <br>
                        <a class="btn btn-success" >  <input type="submit" name="submit" value="add User" >    </a>      
              
                    </form>
    </div>
  </div>                  


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
