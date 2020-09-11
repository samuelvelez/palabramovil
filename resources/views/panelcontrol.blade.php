@extends('layouts.app')
@section('content')


<div class="" style="background-color: #F18835;padding:50px;"> </div>
<section class="agregalibros-registro " style="background-color:#F18835;padding-top: 1px;padding-bottom: 10px;">
		<!--main-section alabaster-start-->
		<div class="" style="background-color: #F18835">
			<div class="container">
                <div class="row">
                    <div class="mx-auto">
                       
                    </div>                  
                </div>
			</div>
		</div>	
</section>

<section id="libros-sec" class="libros-img-fondo">
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-md-9" style="background-color: white;">
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Panel de control</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                 @include('layouts.menudashboard')
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <p><span class="badge badge-primary badge-pill">19</span> Libros disponibles</p>
                      <a href="#" class="btn btn-principal">Subir libros</a>
                    </li>
                  </ul>

                  <div id="demo" style="padding-top: 50px;" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="jumbotron jumbotron-fluid">
                          <div class="container">
                            <h1 class="display-4">Fluid jumbotron</h1>
                            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                       <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h1 class="display-4">Fluid jumbotron</h1>
                          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                        </div>
                      </div>
                      </div>
                      <div class="carousel-item">
                        <div class="jumbotron jumbotron-fluid">
                          <div class="container">
                            <h1 class="display-4">Fluid jumbotron</h1>
                            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Indicators -->
                    <div style="padding-top: 20px;">
                        <ol class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                          <li data-target="#demo" data-slide-to="2"></li>
                        </ol>
                    </div>

                    <!-- Left and right controls -->
                    <!--<a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>-->

                  </div>
                </div>
              </div>


            </div>



        </div>
    </div>
</div>




<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</section>


@endsection
