<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
     
    </div>
    <div class="col">
    <h1>Data Week</h1>
    
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


      <form action="/ajouter/datafinw" method="POST">
    @csrf
   
      <input type="hidden" name="week_number" value="{{ date('W') }}">
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    
    <label for="nh_budget" class="form-label">NH Budget</label>
    <input type="texte" class="form-control" id="nh_budget" name="nh_budget">
  </div>
  <div class="mb-3">
    <label for="nh_actual" class="form-label">NH Actual</label>
    <input type="texte" class="form-control" id="nh_actual" name="nh_actual">
  </div>
  <div class="mb-3">
    <label for="efficience_budget" class="form-label">Efficience Budget</label>
    <input type="texte" class="form-control" id="efficience_budget" name="efficience_budget">
  </div>
  <div class="mb-3">
    <label for="efficience_actual" class="form-label">Efficience Actual</label>
    <input type="texte" class="form-control" id="efficience_actual"   name="efficience_actual">
  </div>
  <button type="submit" class="btn btn-primary"><input type="submit" value="">ADD Data</button>
</form>
    </div>
  </div>                  


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>
