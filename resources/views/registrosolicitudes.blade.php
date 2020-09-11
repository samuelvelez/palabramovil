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
                <h2 style="letter-spacing: 2px;">Mis Solicitudes</h2>       
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
                                     <a class="btn btn-desactivado" href="{{ route('pedidos') }}">Mis solicitudes</a>
                                    <a class="btn btn-principal" href="{{ route('biblioteca') }}">Solicitudes aceptadas</a>
                                </div>
                            </div>
                            
                        </div>
                    @if(count($solicitudes))    
                    @foreach($solicitudes as $solicitud)  
                    <div class="jumbotron jumbotron-fluid" style="padding: 2rem 1rem;margin-bottom: 0.8rem;">
                          <div class="container">
                            <div class="row">
                                <div class=" col-md-2">
                                    @if(!empty($solicitud->imagen)) 
                                        <img style="width: 150px;" class="" src="{{$solicitud->imagen}}">
                                     @else
                                        <img style="width: 150px;" class="" src="../images/users/default.jpg">
                                    @endif
                                </div>
                                
                                <div class=" col-md-8">
                                   
                                    <p class="lead">El usuario <a href="#">{{$solicitud->name}}</a> ha solicitado tu libro <span style="color:orange;">{{$solicitud->titulo}}</span></p>
                                     <ul class="list-group">
                                      
                                     
                                      <li class="list-group-item">Estado Solicitud : <span>{{$solicitud->estado}}</li>
                                     
                                      <!--<li class="list-group-item">Motivo: {{$solicitud->mensaje_respuesta}}</li>-->                              
                                    </ul>
                                </div>
                           
                                <div class=" col-md-2">
                                    
                                     
                                     <div class="dropdown">
                                      <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Aceptar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                        
                                      </div>
                                    </div>
                                     <p class="lead">{{$solicitud->created_at}}</p>
                                     
                                </div>
                            </div>
                           
                           
                          </div>
                        </div>
                    @endforeach    
                    @else
                   <div class="col-md-12">  
                        <div style="padding-top: 50px;">
                            <h2>No Tienes Libros Pedidos</h2>   
                        </div>
                    </div>
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
@endsection
