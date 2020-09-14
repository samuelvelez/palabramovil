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
<!--
<section class="container-fluid giro-libros" style="z-index: 10;">
    <div class="row segundo-giro">
        <div class="mx-auto section-buscador-libros">
         
           {!! Form::open(['route' => 'resultados', 'method' => 'GET','class' => 'form-inline my-2 my-lg-0','role' => 'search']) !!}
          <div class="input-group ">
            <div class="input-group-prepend">
              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#262C60;color:white;" aria-haspopup="true" aria-expanded="false">Categorias</button>
              <div class="dropdown-menu">
                @foreach($categorias as $categoria)  
                  <a class="dropdown-item" href="{{ route('resultados',['name' => $categoria->name,'tipo'=> '2']) }}">{{ $categoria->name}}</a>
                @endforeach
              </div>
            </div>
           
          
            {!! Form::text('name', null, ['class' => 'form-control form-buscar-blanco-inicio', 'placeholder' => 'Busca un libro, género o autor/a']) !!}
              <div class="input-group-append">
                <button class="btn" style="background-color: white;color:#262C60;" type="submit" ><i class="fas fa-search"></i></button>
              </div>
               
          </div>
         {!! Form::close() !!}
        </div>         
    </div>
</section>
-->

<section id="libros-sec" class="libros-img-fondo">
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-md-9" style="background-color: white;">
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Explora</h2>    
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#opc1" style="color:blue;">Libros</a>
                  </li>
                  <li class="nav-item">
                    <a style="color:blue;" class="nav-link" data-toggle="tab" href="#opc2">Géneros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:blue;" data-toggle="tab" href="#opc3">Autores</a>
                  </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane container active card-header" id="opc1" >
                      <ul class="nav">
                            @foreach($letras as $letra)  
                              <li class="nav-item">
                                <a class="nav-link" id="{{ $letra }}" href="{{ route('resultados',['name' => $letra,'tipo'=> '1']) }}">{{ $letra }}</a>
                              </li>
                            @endforeach
                            
                      </ul> 
                  </div>
                  <div class="tab-pane container fade card-header" id="opc2">
                           <ul class="nav">
                            @foreach($categorias as $categoria)  
                              <li class="nav-item">
                                <a class="nav-link" id="{{ $categoria->name }}" href="{{ route('resultados',['name' => $categoria->name,'tipo'=> '2']) }}">{{ $categoria->name }}</a>
                              </li>
                            @endforeach
                            </ul> 
                  </div>
                  <div class="tab-pane container fade card-header" id="opc3">
                    <ul class="nav">
                            @foreach($letras as $letra)  
                              <li class="nav-item">
                                <a class="nav-link" id="{{ $letra }}" href="{{ route('resultados',['name' => $letra,'tipo'=> '3']) }}">{{ $letra }}</a>
                              </li>
                            @endforeach
                            
                      </ul> 
                  </div>
                </div>
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
                
             
                        <div class="row col-md-12 mx-auto ">
                          
                          @foreach($libros as $libro)  
                          
                          <div class="col-md-6 ">
                            <div class="row libros-contenedor">
                              <div class="col-md-4">
                                  <img class="mx-auto d-block" src="{{$libro->imagen}}" style="width:150px;height:150px;" >
                              </div>
                              <div class="col-md-5 letras-libros">
                                      <h3>{{$libro->titulo}}</h3>
                                      <h4>{{$libro->autor}}</h4>
                                      <!--<p>{{$libro->descripcion}}</p>   -->
                                      <!--<p>Subido por: <a href="{{ route('perfilpublico', $libro->user_id) }}">{{$libro->name}}</a></p> -->
                                      <div class="row letras-libros-imagen">
                                       
                                        <p>Subido por:<a href="{{ route('perfilpublico', $libro->name) }}"> {{$libro->name}}</a></p> 
                                      </div>                                 
                                      <input type="hidden" id="custId" name="custId" value="{{$libro->id}}">
                              </div>
                              <div class="col-md-3">
                              @guest
                                  <p>Te gustaría  leer el libro?</p>
                                  <a type="button" style="background-color:#262c60;color:white;" class="btn"  href="{{ route('register') }}" >Registrate</a>
                              @endguest
                              @auth
                              @if((auth()->user()->estado_usuario == 'registro_pendiente')) 
                             
                              <p>Debes completar tu registro</p>
                               <a type="button" style="background-color:#262c60;color:white;" class="btn"  href="{{ route('registro') }}" >Completar</a>
                              <!--['idguest' => $idguest->id, 'idbook' => $idbook->id, 'idroom' => $idroom->id]-->
                              @else
                             
                              <a type="button" style="" class="btn btn-desactivado"  href="{{ route('prestamo', ['id' => Crypt::encrypt($libro->user_id), 'idlibro' => Crypt::encrypt($libro->id)]) }}" >¡Quiero Leerlo!</a>


                              @endif
                              @endauth
                              </div>
                            </div>
                          </div>
                          @endforeach 
                          
                        </div>
                <div style="padding-top: 20px">
                {{ $libros->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitudes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Se enviara tu petición del libro para que sea aceptada o rechazada </p>
        <p>Puedes ver el estado de tu peticion <a href="{{ route('pedidos') }}">aquí</a></p>
      </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitudes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tu pedido se encuentra en espera de confirmacion  </p>
        <p>Puedes ver el estado <a href="{{ route('pedidos') }}">aquí</a></p>
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


@if(!empty(Session::get('error_code')) && Session::get('error_code') == 2)
<script>
$(function() {
    $('#exampleModal').modal('show');

});
</script>
@elseif(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
<script>
$(function() {
    $('#exampleModal2').modal('show');
});
</script>
@endif
@endsection
