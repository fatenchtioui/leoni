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
    <h1>Data </h1>
    
    
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

      <form action='/ajouu/datavc' method="POST">
    @csrf
          
  <div class="mb-3">
    <label for="hc_direct" class="form-label">HC Direct</label>
    <input type="texte" class="form-control" id="hc_direct" name="hc_direct" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="hc_indirect" class="form-label">HC Indirect</label>
    <input type="texte" class="form-control" id="hc_indirect" name="hc_indirect">
  </div>
  <div class="mb-3">
    <label for="abs_p" class="form-label">ABS P</label>
    <input type="texte" class="form-control" id="abs_p" name="abs_p">
  </div>
  <div class="mb-3">
    <label for="abs_np" class="form-label">ABS NP</label>
    <input type="texte" class="form-control" id="abs_np" name="abs_np">
  </div>
  <div class="mb-3">
    <label for="fluctuation" class="form-label">Fluctuation</label>
    <input type="texte" class="form-control" id="fluctuation"   name="fluctuation">
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
