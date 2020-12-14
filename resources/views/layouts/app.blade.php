<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OCDI') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>


    <!-- Styles -->
    
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
     <style>
             body {
  font-family: "Helvetica";
  /*background: linear-gradient(top, black, white);*/

   /* Safari 4-5, Chrome 1-9 */
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(white), to(black));
    /* Safari 5.1+, Chrome 10+ */
    background: -webkit-linear-gradient(top, #003E65, white);
    /* Firefox 3.6+ */
    background: -moz-linear-gradient(top, #003E65, white);
    /* Opera 11.10+ */
    background: -o-linear-background(top, #003E65, white);
    /* IE 10 */
    background: -ms-linear-background(top, #003E65, white);
    /* estándar */
    background: linear-background(top, #003E65, white);
  background-repeat: no-repeat;
    background-attachment: fixed;

  /* style="background-color: #003E65;" */
}

         </style>
    @stack('pushscss')
</head>
<body>
    <div id="app">
        <!-- dashboard-->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark mb-3 border-bottom shadow-sm border" style="background-color: #3271a9">
            <div class="container pr-0">
                 <div class="row col-md-12 pr-0">
                    <div class="flex-row d-flex col-md-2 ">
                        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">
                       
                    </a>
                    </div>

              

                    <div class="collapse navbar-collapse" id="navbarSupportedContent col-md-10">
                   
                    <!-- Right Side Of Navbar -->                       
                        <div class="col-sm-10 text-center">
                            <div class="row">
                                <div class="col-md-6 mx-auto rounded" style="background-color: #3271a9;opacity: .8">
                                  <div style="color: #fff;">
                                      <h1 class="mb-0"><strong>Weather</strong></h1>
                                      <span style="font-size: 14px"><span></span><br>
                                          <h7>
                                              
                                          </h7>
                                      </span>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div class="col-sm-2 d-flex justify-content-end text-right">
                            <div class="row">
                               <div class="col-md-5 mr-2">
                                    
                                </div>
                                <!-- <div class="col-md-6 ml-0 pl-0 align-self-center text-left">SALIR</div> -->
                            </div>               
                           
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid" id="main">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0 rounded-lg" id="sidebar" role="navigation">
                  <div style="margin-top:100px">
                    
                    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0 ml-2 mt-4 pt-4">Menu</p>
                    <ul class="nav flex-column bg-white mb-0 ml-2 rounded shadow-sm">
                      <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link text-dark font-italic">
                                  <i class="fa fa-home  text-primary fa-fw"></i>
                                  Home
                              </a>
                      </li>
                     
                      <li class="nav-item">
                        <a href="javascript: void(0)" class="nav-link text-dark font-italic" id="getWeather">
                                  <i class="fa fa-edit  text-primary fa-fw"></i>
                                  Consult historical
                              </a>
                      </li>
                      


                        


                                     
                    </ul> 
                  </div>                   
                </div>
                <!--/col-->
                <div class="col main pt-6 mt-3" >
                  <main class="py-4 " style="background-color: #f8f9fa ;min-height: 800px">                    
                    @yield('content')
                </main>
                      
                </div>
                <!--/main col-->
            </div>
        </div>
        
        <!-- Fin dashboard-->
        
    </div>
    

     <!-- Scripts -->
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
			  
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9/crypto-js.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js" ></script>
   
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
    <script src="{{ asset('/js/Weather.js') }}"></script>
    @stack('pushscriptjs')
    @stack('pushscriptjspart')
</body>
</html>
