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
                <h2 style="letter-spacing: 2px;">Mis Notificaciones</h2>    
                <!--<h4>Acepta o Rechaza</h4>   
                <h5>Las solicitudes de tus libros por otros usuarios de PalabraMovil</h5> -->
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                   @include('layouts.menudashboard')
                </div>
                <!--******************************** CONTENEDOR ********************************-->
                <div class="card-body">
                 
                  @if(count($solicitudes)) 
                        <div class="table-responsive ">
                            @switch($confirmacion)
                            @case('poraceptar')
                          

                             @foreach($solicitudes as $solicitud)  
                             <!-- ********** MODAL *********** -->
                              <div class="modal fade" id="create-{{$solicitud->id}}">
                                    <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#F18835;color:white;text-align:center;">
                                                    <h5 class="modal-title">¿Por qué no quieres aceptar la solicitud?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   

                                                    <a class="btn btn-primary btn-lg btn-block"  href="{{ route('negacionlibro', ['id' => $solicitud->id,'valor' => '1']) }}" >Bajo rating del usuario</a>
                                                    <a class="btn btn-primary btn-lg btn-block"  href="{{ route('negacionlibro', ['id' => $solicitud->id,'valor' => '2']) }}" >Me genera desconfianza</a>
                                                    <a class="btn btn-primary btn-lg btn-block"  href="{{ route('negacionlibro', ['id' => $solicitud->id,'valor' => '3']) }}" >Removeré el libro de mi biblioteca</a>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                                                    
                                                   
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <!-- ********** FIN MODAL *********** -->
                            <div class="jumbotron jumbotron-fluid" style="padding: 2rem 1rem;margin-bottom: 0.8rem;">
                              <div class="container">
                                <div class="row">
                                    <div class=" col-md-9" style="text-align: left;">
                                        <p>codigo: {{$solicitud->id_emisor}}</p>
                                        <p class="lead"><a  href="http://palabralab.test:81/user/{{$solicitud->name}}" class="">{{$solicitud->name}}</a> ha solicitado tu libro <span style="color:blue;">{{$solicitud->titulo}}</span> de tu biblioteca</p>
                                        
                                        <p class="lead" style="font-size: 10px;text-align: left;">{{$solicitud->created_at}}</p>    
                                    </div>
                                    <div class=" col-md-3">
                                        <a class="btn btn-solicitud btn-lg"  href="{{ route('confirmacionlibro', ['id' => $solicitud->id]) }}" >Aceptar</a>
                                        <button type="button" class="btn btn-solicitud btn-lg" data-toggle="modal" data-target="#create-{{$solicitud->id}}"  href="#" >Rechazar</button>    
                                    </div>
                                </div>
                              </div>
                            </div>
                           
                            @endforeach
                            
                                @break
                            @case('enespera')
                                <table class="table">
                                    <thead>
                                        <th>enespera</th>
                                        <th>Libro</th>
                                        <th>Nombre Persona</th>
                                        <th>estado</th>                    
                                        <th>Celular</th>
                                        <th>Motivo</th> 
                                    </thead>
                                    <tbody>                   
                                            @foreach($solicitudes as $solicitud)  
                                            @if ($solicitud->estado == 'pendiente')
                                            <tr>
                                                <th>enespera</th>
                                                <td>{{$solicitud->titulo}}</td>
                                                <td>{{$solicitud->name}}</td>
                                                <td>{{$solicitud->estado}}</td>
                                                <td>{{$solicitud->celular}}</td>
                                                <td>{{$solicitud->mensaje_respuesta}}</td> 
                                            </tr>
                                            @endif

                                            @endforeach
                                    </tbody>
                                </table>
                                @break

                            @default
                                <span>Something went wrong, please try again</span>
                            @endswitch
                        </div>
                        @else
                        <div class="col-md-12">  
                            <h2>No Tienes Solicitudes :(</h2>
                            
                        </div>
                        @endif

                </div>
                <!--***************************************************************************-->

              </div>


            </div>



        </div>
    </div>
</div>


<div style="padding:20px;"></div>
</section>
@endsection
