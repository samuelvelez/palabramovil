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
                                   
                                    <a href="{{ route('configuracion') }}" class="btn btn-primary">¡Quiero Leerlo!</a>
                                </div>
                            @else 
                            <div class="col-md-12" style="background-color:;">
                                   
                                    <h2>{{$persona->nombre}}</h2>
                                    <p>Resumen: {{$persona->descripcion}}</p>
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
                <div class="contenedor-slider-inside-img" >  
                        <div class="registro-img-div img-palabra-semi">
                            <div class="giro-alinear  mx-auto d-block">
                                @if($persona)                                                  
                                     <img class="img-registro-destacado-inicio" id="holas3" style="object-fit:cover;" src="{{$persona->imagen}}">        
                                @else 
                                    <img class="img-registro-destacado-inicio" id="holas2" style="object-fit:cover;" src="/images/users/default.jpg"> 
                                @endif   
                            </div>
                        </div>		
                </div>
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
						<h2>en su biblioteca</h2>
                        </div>
					</div>
					<div class="col-md-6"></div>
                </div>
                @foreach($libros as $libro)  
                <div class="row" style="padding:40px;">
					<div class="col-md-6">
						<!--PRIMERA IMAGEN-->
						<div class="img-palabra img-sect-2-home" >
							<div class="img-palabra-3" style="height: 320px;">
								
								<img class="img-home-destacado-inicio"  src="../{{$libro->imagen}}">
								
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
                            <button type="button" class="btn btn-primary">Quiero Leerlo</button>
                               
						</div>
					</div>
                </div>
                @endforeach    
			</div>
		</div>	
</section>
@endsection
