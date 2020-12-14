@extends('layouts.app')

@section('content')
<style>
     .logo-image {
            width: 100px;
            height: 100px;
        }
    </style>
     
<div class="container rounded shadow-sm col-md-11 mx-auto" id="divWeather" style="background-color: #fff">
    <div class="row justify-content-center mb-4">
        <div class="col-md-2 mx-auto text-center card-title" style="margin-top: 50px">
            <h4><strong>Welcome</strong></h4>
            
        </div>
    </div>
    <div class="row justify-content-center">
       
         <div class="container py-4 col-md-11 mx-auto">
            <!-- <p><strong>Bootstrap 4 full click cards...</strong></p> -->
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card p-4 " id="la">
                       
                        
                    </div>
                    <div class="card p-4 " id="or">
                        
                        

                        
                    </div>  
                    <div class="card p-4 " id="mi">
                       

                        

                        
                    </div>                                                       
                </div>
            </div>
        </div>
 
          
</div>
<div class="row justify-content-center">
    <div class="py-4 col-md-11 mx-auto">
        <div id="divMap" style="width:100%; height: 400px;" class="col-md-12"></div>
    </div>
</div>
<div class="row justify-content-center ml-4 mr-4">
       
        <table class="table" id="tabWeather">
  <thead class="thead-dark">
    <tr>
      <th scope="col">City</th>
      <th scope="col">Time</th>
      <th scope="col">Humidity</th>
    </tr>
  </thead>
  <tbody id="tbWeather">
   
  </tbody>
</table>
          
</div>
   </div>
@endsection

