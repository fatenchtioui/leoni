<x-app-layout>




<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            @import url('https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css');

button.neumorphic {
  container-type: inline-size;
  aspect-ratio: 1/1;
  border: 0.5rem solid transparent;
  border-radius: 1rem;
  color: hsl(0 0% 10%);
  background: none;
  
  display: grid;
  place-content: center;
  gap: 1rem;
  
  --shadow: 
    -.5rem -.5rem 1rem hsl(0 0% 100% / .75),
    .5rem .5rem 1rem hsl(0 0% 50% / .5);
  box-shadow: var(--shadow);
  outline: none;  
  transition: all 0.1s;
  
  &:hover, &:focus-visible {
    color: hsl(10 80% 50%);
    scale: 1.1
  }
  &:active, &.active{
    box-shadow:
      var(--shadow),
      inset .5rem .5rem 1rem hsl(0 0% 50% / .5),
      inset -.5rem -.5rem 1rem hsl(0 0% 100% / .75);
    color: hsl(10 80% 50%);
    > i { font-size: 28cqi};
    > span { font-size: 13cqi};
  }

  >i {
    font-size: 31cqi;
  }
  > span {
    font-family: system-ui, sans-serif;
    font-size: 16cqi;
  }
}

body {
  background-color: #e5e9f4;
  padding: 2rem;
}
h1 {
  text-align: center;
  color: hsl(0 0% 10%);
  font-family: system-ui, sans-serif;
  font-size: 3rem;
}
.buttons {
  display: grid;
  width: min(75rem, 100%);
  margin-inline: auto;
  grid-template-columns: repeat(auto-fit, minmax(min(8rem, 100%), 1fr));
  gap: 2rem;
}
        </style>
    </head>

    <body>
    <h1>RH Dash</h1>
<div class="buttons">  
 
 
  
  <button class="neumorphic">

  </button>
  <button class="neumorphic"onclick="window.location.href='/ajo'">
  <i class="fa-solid fa-user"></i>
    <span>ADD Data RH</span>
  </button>
  <button class="neumorphic">
  
    <span></span>
  </button>
 
  <button class="neumorphic" onclick="window.location.href='/chatify'">
  <i class="fa-solid fa-messages"></i>
  <span>Message</span>
</button>
<button class="neumorphic">
   
   </button>

</div>
    </body>
    </html>









<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __(" ") }}
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">


</div>
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
      
       
  <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client forcast s1</th>
                    <th>Production Calendar</th>
                    <th>Customer Calendar</th>
                    <th>Customer Consumption Last 12 Week</th>
                    <th>Stock Plant: Tic Tool</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                @foreach ($datarhs as $item)
                                <tr>
                                
    <td>{{$item->id}}</td>
    <td>{{$item->client_forcast_s1}}</td>
    <td>{{$item->production_calendar}}</td>
    <td>{{$item->customer_calendar}}</td>
    <td>{{$item->customer_consumption_last_12_week}}</td>
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