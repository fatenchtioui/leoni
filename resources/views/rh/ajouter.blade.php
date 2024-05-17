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
    <h1>Data RH</h1>
    
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
      <form action='/ajou/datarh' method="POST">
    @csrf
    
           
  <div class="mb-3">
    <label for="client_forcast_s1" class="form-label">Client forcast s1</label>
    <input type="texte" class="form-control" id="client_forcast_s1" name="client_forcast_s1" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="production_calendar" class="form-label">Production Calendar</label>
    <input type="texte" class="form-control" id="production_calendar" name="production_calendar">
  </div>
  <div class="mb-3">
    <label for="customer_calendar" class="form-label">Customer Calendar</label>
    <input type="texte" class="form-control" id="customer_calendar" name="customer_calendar">
  </div>
  <div class="mb-3">
    
    <label for="customer_consumption_last_12_week" class="form-label">Customer Consumption Last 12 Week</label>
    <input type="texte" class="form-control" id="customer_consumption_last_12_week" name="customer_consumption_last_12_week">
  </div>
  <div class="mb-3">
    <label for="stock_plant_tic_tool" class="form-label">Stock Plant: Tic Tool</label>
    <input type="texte" class="form-control" id="stock_plant_tic_tool"   name="stock_plant_tic_tool">
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