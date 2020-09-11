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
</section>-->


<section id="libros-sec" class="libros-img-fondo" style="padding-bottom: 50px;">
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-md-9" style="background-color: white;">
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Resultados de tu busqueda:</h2> 

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
            <div class="card" >
                <!--<div class="card-header">Resultados de tu busqueda:</div>-->
               
                @if(count($libros))  
                   
                    @foreach($libros as $libro)  
                    <div class="card-body" style='padding:20px;'>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="mx-auto d-block" src="{{$libro->imagen}}" style="width:150px;height:150px;" >
                                </div>
                                <div class="col-md-8">
                                        <h3>{{$libro->titulo}}</h3>
                                        <p>Autor: {{$libro->autor}}</p>     
                                        <p>{{$libro->descripcion}}</p>   
                                        <p>{{$libro->estado}}</p>   
                                               
                                </div>
                                <div class="col-md-2">
                                  @guest
                                   <p>Te gustaría  leer el libro?</p>
                                   <a type="button" style="background-color:#262c60;color:white;" class="btn"  href="{{ route('register') }}" >Registrate</a>
                                  @endguest
                                  @auth
                                  @if((auth()->user()->estado_usuario == 'registro_pendiente')) 
                                  <!--<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">¡Quiero Leerlo!</button>-->
                                  <p>Debes completar tu registro</p>
                                   <a type="button" style="background-color:#262c60;color:white;" class="btn"  href="{{ route('registro') }}" >Completar</a>
                                  <!--['idguest' => $idguest->id, 'idbook' => $idbook->id, 'idroom' => $idroom->id]-->
                                  @else                                                 

                                  <a type="button" style="" class="btn btn-desactivado"  href="{{ route('prestamo', ['iduserlibro' => Crypt::encrypt($libro->user_id), 'idlibro' => Crypt::encrypt($libro->id)]) }}" >¡Quiero Leerlo!</a>


                                  @endif
                                  @endauth
                                </div>
                            </div>
                       
                    </div>
                    @endforeach 
                @else
                   
                    <div class="card-body" style='padding:20px;'>
                        <h3>No se encontraron resultados para tu busqueda</h3>
                        <!--<p style="text-align: center;"><span style="color:grey;font-size: 100px;" class="far fa-grin-beam-sweat"></span></p>-->
                    </div>
                    
                @endif
            </div>
        </div>
    </div>
</div>
</section>
@endsection
