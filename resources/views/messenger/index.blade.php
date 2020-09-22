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

<section id="libros-sec2" class="libros-img-fondo">
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-md-9" style="background-color: white;">
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Mis Mensajes</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                  @include('layouts.menudashboard')
                </div>
                <div class="card-body">
                	<div class="header-sidebar">
                            <div class="row">
                                <div class="col-md-8">
                                     <h4>Acuerdas el lugar y la hora de entrega</h4>   
                                     <h5>Contáctate con el Usuario para concretar el lugar de encuentro</h5>  
                                </div>
                                 <div class="col-md-4">
                                </div>
                            </div>
                  </div>
                   
                  @if(count($threads)) 
                     
			                 @include('messenger.partials.flash')
			                 @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                       
                     
                  @else
                    <p>No tienes mensajes disponibles</p>
                  @endif
        		    </div>
              </div>


            </div>



        </div>
    </div>
</div>




<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
</section>
@stop

