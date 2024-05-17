
<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



<div class="container text-center">
    <div class="row align-items-start">
    <div class="col">
            <!-- Contenu du deuxième col -->
        </div>
        <div class="col ">
            <h1>Data Monthly</h1>
        </div>
        <div class="col">
            <!-- Contenu du deuxième col -->
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


<form action="/ajoute/datafinm" method="POST">
    @csrf
    <!-- Autres champs du formulaire -->

    <input type="hidden" name="current_month" value="{{ date('n') }}">

            <div class="mb-3">
                <label for="sales_budget" class="form-label">Sales Budget</label>
                <input type="text" class="form-control" id="sales_budget" name="sales_budget">
            </div>
            <div class="mb-3">
                <label for="sales_actual" class="form-label">Sales Actual</label>
                <input type="text" class="form-control" id="sales_actual" name="sales_actual">
            </div>
            <button type="submit" class="btn btn-primary">ADD Data</button>
        </form>
    </div>
</div>


</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  </x-app-layout>