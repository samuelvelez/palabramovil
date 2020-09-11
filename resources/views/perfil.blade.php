@extends('layouts.app')

@section('content')
<!-- Perfil -->
<div class="container-fluid contenedor-slider-3" >
	  <div class="row">
            <div class="col-md-6 col-sm-6">
				<div class="contenedor-slider-inside-registro" >
					<div class="texto-perfil-sec1">
						
                            <div class="row" style="background-color:;">
                            @if(is_null($persona))  
                            <div class="col-md-12">
                                    <h2>completa Tu perfil</h2>
                                    <p>Para poder prestar y subir libros:<p>
                                    <a href="{{ route('registro') }}" class="btn btn-principal">completar perfil</a>
                                </div>
                            @else 
                            <div class="col-md-12" style="background-color:;">
                                    <h2>{{$persona->nombre}}</h2>
                                    <p><span>Sobre mí:</span></p>
                                    <div class="sobremi-perfil">
                                        
                                        <p>{{$persona->descripcion}}</p>
                                    </div>
                                    <p><span>Tus Gustos Literarios:</span></p>
                                    
                                    <div clas="btn-group">
                                        @foreach($generos as $genero)
                                        <a href="#" class="btn btn-secundario">{{$genero->name}}</a>
                                        
                                        @endforeach
                                    </div>
                                    
                                </div>
                                
                                
                            @endif   
                            </div>     


                    </div>
				</div>
			</div>
		  	<div class="col-md-6 col-sm-6 hidden-xs hidden-sm contenedor-fondo-sec1">
                 @if(is_null($persona))  
                <div class="contenedor-slider-inside-img" >  
                        <div class="registro-img-div img-palabra-semi">
                            <div class="giro-alinear  mx-auto d-block">
                                <img class="img-registro-destacado-inicio" style="object-fit:cover;" src="../images/users/default.jpg">                  
                            </div>
                        </div>		
                </div>
                
                @else 

                <div class="contenedor-slider-inside-img" >  
                        <div class="registro-img-div img-palabra-semi">
                            <div class="giro-alinear  mx-auto d-block">
                                <img class="img-registro-destacado-inicio" style="object-fit:cover;" src="{{$persona->imagen}}"> 
                            </div>
                        </div>      
                </div>   
                <a type="button"  href="{{ route('editarperfil',['id' => Crypt::encrypt(Auth::user()->id)]) }}" class="btn  btn-secundario"><i class="fas fa-cog"></i> Editar perfil</a>
                @endif 
                                
                          
			</div>
	  </div>	
</div>
<!-- Libros -->
<section class="main-section agregalibros-registro primer-giro">
		<!--main-section alabaster-start-->
		<div class="segundo-giro">
			<div class="container">
            
				<div class="row">
					<div class="col-md-6">
                        <div class="texto-sect-2-registro">
						<h3>Libros disponibles</h3>
						<h2>en tu biblioteca</h2>
                        </div>
					</div>
					<div class="col-md-6"></div>
                </div>
                @if(count($libros))  
                @foreach($libros as $libro)  
                <div class="row" style="padding:40px;">
					<div class="col-md-6">
						<!--PRIMERA IMAGEN-->
						<div class="img-palabra img-sect-2-home" >
							<div class="img-palabra-3" style="height: 320px;">
								
								<img class="img-home-destacado-inicio"  src="{{$libro->imagen}}">
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="texto-libros-perfil">
							
                            <h2>{{$libro->titulo}}</h2><br>
                            <h3>autor: {{$libro->autor}}</h3><br>
                            <div class="separador-texto-perfil"></div><br>
                            <p><span class="">Descripción:</span></p>
                            <p>{{$libro->descripcion}}</p><br>
                            <p>Número Páginas: {{$libro->paginas}}</p><br>
                            
                               
						</div>
					</div>
                </div>
                @endforeach  
                @else 
                    <div class="perfil-texto-detalle">
                        <h3>¿No tienes libros en tu biblioteca?</h3>
                        <a type="button" href="{{ route('subirlibros') }}" class="btn btn-principal">Sube un libro</a>
                    </div>
                @endif    
			</div>
		</div>	
</section>
@endsection
