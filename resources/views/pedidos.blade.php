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
                <h2 style="letter-spacing: 2px;">Historial de solicitudes</h2>
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                  @include('layouts.menudashboard')
                </div>
                <div class="card-body">                                   
                    <div class="col-md-12">  
                        <div style="padding-top: 20px;">
                            <h3 style="text-align: left;">Mis Solicitudes  <i href="#" data-toggle="tooltip" class="tool-info fas fa-info-circle" data-placement="right" title="Lista de solicitudes que has enviado"></i></h3> 
                        </div>
                    </div>
                    @if(count($solicitudes))  
                    @foreach($solicitudes as $solicitud)  
                    <div class="jumbotron jumbotron-fluid" style="padding: 2rem 1rem;margin-bottom: 0.8rem;">
                          <div class="container">
                            @if($solicitud->id_emisor == Auth::user()->id)
                            <div class="row">
                                <div class=" col-md-2">
                                    @if(!empty($solicitud->imagen)) 
                                        <img style="width: 100px;" class="" src="{{$solicitud->imagen}}">
                                     @else
                                        <img style="width: 100px;" class="" src="../images/users/default.jpg">
                                    @endif
                                </div>                              
                                <div class=" col-md-8">                                   
                                    <p class=""> Has solicitado el libro <span style="color:black;">{{$solicitud->titulo}}</span> al usuario: {{$solicitud->name}}</p>
                                    <ul class="list-group">    
                                    @if(($solicitud->estado == 'aceptada'))                                                                       
                                        <li class="list-group-item" style="color:green";>Estado de solicitud : <span>{{$solicitud->estado}}</li>
                                    @elseif(($solicitud->estado == 'rechazada'))    
                                        <li class="list-group-item" style="color:red";>Estado de solicitud : <span>{{$solicitud->estado}}</li>       
                                    @else
                                        <li class="list-group-item" style="color:orange;">Estado de solicitud : <span>{{$solicitud->estado}}</li>
                                    @endif
                                    </ul>    
                                </div>                                                              
                                <div class=" col-md-2">                                  
                                    @if(($solicitud->estado == 'aceptada' And $solicitud->estado_conversacion == 'pendiente'))
                                        <a class="btn btn-desactivado" href="/messages/create/{{$solicitud->id}}">Enviar Mensaje</a>
                                        

                                        <form action="{{ route('messages.create', Crypt::encrypt($solicitud->id)) }}" method="get">
                                             <div class="form-group">
                                                <button type="submit" class="btn btn-principal form-control">Enviar</button>
                                            </div>
                                        </form>
                                    @elseif(($solicitud->estado == 'aceptada' And $solicitud->estado_conversacion == 'iniciada'))
                                        <a href="/messages">Ver mensajes</a>
                                    @else
                                    @endif
                                     <p class="lead" style="font-size: 12px;">{{$solicitud->created_at}}</p>                                   
                                </div>
                            </div> 
                            @else
                           
                            <p>No tienes libros solicitados</p>
                            @endif                                                
                          </div>
                        </div>
                        
                    @endforeach
                    @else
                    <div class="col-md-12">  
                        <div style="padding-top: 50px;padding-left: 20px;">
                            <h5>No Tienes Libros Pedidos</h5>   
                        </div>
                    </div>
                    @endif
                </div>
                <!-- ********************* CONTENEDOR 2 ***********************-->
                <div class="card-body">  
                  <div class="col-md-12">  
                        <div style="padding-top: 1px;">
                            <h3 style="text-align: left;">Solicitudes de otros usuarios <i href="#" data-toggle="tooltip" class="tool-info fas fa-info-circle" data-placement="right" title="Lista de solicitudes que has recibido"></i></h3> 
                        </div> 
                        </div>
                    </div>
                    @if(count($solicitudes2))    
                    @foreach($solicitudes2 as $solicitud2)  
                    <div class="jumbotron jumbotron-fluid" style="padding: 2rem 1rem;margin-bottom: 0.8rem;">
                          <div class="container">
                            <div class="row">
                                <div class=" col-md-2">
                                    @if(!empty($solicitud2->imagen)) 
                                        <img style="width: 100px;" class="" src="{{$solicitud2->imagen}}">
                                     @else
                                        <img style="width: 100px;" class="" src="../images/users/default.jpg">
                                    @endif
                                </div>
                                
                                <div class=" col-md-8">
                                   
                                    <p class="">El usuario <a href="#">{{$solicitud2->name}}</a> ha solicitado tu libro <span style="color:black;">{{$solicitud2->titulo}}</span></p>
                                     <ul class="list-group">
                                        @if(($solicitud2->estado == 'aceptada'))                                                                       
                                            <li class="list-group-item" style="color:green";>Solicitud : <span>{{$solicitud2->estado}}</span></li>
                                            <p>Espera hasta recibir su <a href="/messages">mensaje</a></p>
                                        @elseif(($solicitud2->estado == 'rechazada'))    
                                            <li class="list-group-item" style="color:red";>Solicitud : <span>{{$solicitud2->estado}}</li>       
                                        @else
                                            <li class="list-group-item" style="color:orange;">Solicitud : <span>{{$solicitud2->estado}}</li>
                                        @endif                                                              
                                      <!--<li class="list-group-item">Motivo: {{$solicitud2->mensaje_respuesta}}</li>-->                              
                                    </ul>
                                </div>
                           
                                <div class=" col-md-2">
        
                                     <p class="lead" style="font-size: 12px;">{{$solicitud2->created_at}}</p>
                                     
                                </div>
                            </div>
                           
                           
                          </div>
                        </div>
                    @endforeach    

                    @else
                   <div class="col-md-12">  
                        <div style="padding-top: 50px;padding-left: 20px;">
                            <h5>No Tienes solicitudes de Libros</h5>   
                        </div>
                    </div>
                    @endif
                    {{ $solicitudes2->links() }}
                    
                </div> 
                <!-- ********************* FIN CONTENEDORES***********************--> 
              </div>
            </div>
        </div>
    </div>
</div>
<div style="padding:20px;"></div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- ************************************************************************ -->
</section>
@endsection