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
    <h2>Importer un fichier CSV </h2>
    
    
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<br>
<br>
<div class="container text-center">
  <div class="row align-items-start">


      <div class="modal-header">
        
      </div>
      <div class="modal-body">
        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
           
            <input type="file" class="form-control" id="fileInput" name="file">
          </div>
          <br>
          <br>
          <br>
          <button type="submit" class="btn btn-primary">Importer</button>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</x-app-layout>