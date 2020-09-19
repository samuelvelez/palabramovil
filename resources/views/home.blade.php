@extends('layouts.app2')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->


<div class="container-fluid contenedor-slider" >
    
    <div class="row">
    <div class="col-sm-12 col-md-6 col-sm-6 hidden-xs hidden-sm">
				<img class="animatbale fadeInUp img_principal" src="images/BANNER-1-INICIO-min.png">
			</div>
			<div class="col-sm-12 col-md-6 col-sm-6">
				 
                <div class="contenedor-slider-inside" >

                		{!! Form::open(['route' => 'resultados', 'method' => 'GET','class' => 'form-inline my-2 my-lg-0','role' => 'search']) !!}
						<div class="container-fluid row">
						<div class="col-12">
						{!! Form::text('name', null, ['class' => 'form-control mr-sm-1 form-buscar-blanco-home', 'placeholder' => 'Busca un libro, género o autor/a']) !!}
						
						<button class="btn my-2 my-sm-0  btn_buscar" type="submit"><i class="fas fa-search"></i></button>
						</div>
						</div>
                            
                                    
                            
                        {!! Form::close() !!}


                        
                        
                    <div class="contenedor-texto-inicio"> 
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-sm-6 col-xl-6 text-right p-0">
									<p class="texto-slider">BIENVENIDO A</p>
								</div>
								<div class="col-12 col-sm-6 col-xl-6 text-left bb_orange p-0">
								<p class="texto-slider"><span class="text-bold-inside">PALABRA MÓVIL</span></p>				
								</div>
							</div>
						</div>
					<p class="texto-slider-inicio">La primera web en la que puedes encontrar<br><span class="text-bold-inside-inicio">el libro que buscas y que alguien más tiene para ti</span></p>
					</div>
					@guest
					<button type="button" class="btn btn-registro-fb-md">Registrate con Facebook</button>
					<button  data-toggle="modal" data-target="#myModal" type="button" class="btn  btn-registro-ce-md">Registrate con tu correo</button>
					@endguest
					<a href="#home-sec-1" type="button" id="" class="btn btn-how-work como-funciona">¿Cómo Funciona?</a>
                    @guest
                    <div class="buscador-slider">
						
						
					</div>
                    @else
					<div class="buscador-slider">
						
					</div>
                    @endguest
				</div>
            </div>
    </div>
</div>
<!-- ************************ The Modal ******************************-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#F18835;color:white;">
        <h4 class="modal-title" style="text-align: center;">Regístrate con tu correo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Usuario:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style='background-color:#262C60;color:white;'>
                                Regístrate
                                </button>
                            </div>
                        </div>
                    </form>
      </div>

      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>-->

    </div>
  </div>
</div>
<!--************************** Seccion 1 **************************-->
<section class="main-section primer-giro" id="home-sec-1" style="">
		
			<div class="container-fluid segundo-giro">
				<div class="row" style="margin-left: 0px;margin-right:0px;">
					<div  class="col-md-1" ></div>
					<div class="col-md-5"  style="padding: 0px;z-index: 20!important;">
						<div class="text-comofunc">
							<h2>¿Cómo</h2>
							<h3>funciona?</h3>	
						</div>
						<div class="pasos-left">
							
							<div class="row">
								<div class="col-md-3">
								<p style="color: white;font-size: 40px;font-family: 'Brandon_bold';">PASO</p>		
									<div class="primer-giro texto-sect-1-home">
										<div class="segundo-giro">
											<p style="text-align: center;">1</p>
										</div>							
									</div>							
								</div>
								<div class="col-md-8 pasos-left-box2">
									<p>Regístrate con Facebook o tu correo y completa tu perﬁl</p>
									<span>*tu información no será compartida con nadie</span>
								</div>
							</div>

						</div>
						
					</div>

					<div class="col-md-6 animatable fadeInUp" style="padding-right: 0px;">
						 <img class="img-inicio-pasos-right"  src="images/pasos1.png">
						
							<!--<div class="img-palabra conten-img-lateral">
								<div class="img-palabra-3-lateral">
									<div class="layer"></div>
									<img class="img-home-libros"  src="img/foto-referencia-libros-3.jpg">
									
								</div>
							</div>-->
								    <!--<img class="img-home-semidestacado-inicio-lateral"  src="images/pasos2.png">-->

                            <div class="img-palabra-semi-lateral" >
								
				            </div>

						
						
					</div>

				</div>
			</div>		
	</section>
	<!--************************** Seccion 2 **************************-->
<section  class="main-section-left primer-giro" id="home-sec-2" style="">
		
			<div class="container-fluid segundo-giro">
				<div class="row" style="margin-left: 0px;margin-right:0px;">
					
					

					<div class="col-md-6 animatable fadeInUp" style="padding-left: 0px;">
						 <img class="img-inicio-pasos-left"  src="images/pasos2.png">
						
							

                            <div class="img-palabra-semi-lateral" >
								
				            </div>

						
						
					</div>
					<div  class="col-md-1" ></div>
					<div class="col-md-5"  style="padding: 0px;z-index: 20!important;">
						
						<div class="pasos-right">
							
							<div class="row">
								<div class="col-md-3">
								<p style="color: white;font-size: 40px;font-family: 'Brandon_bold';">PASO</p>		
									<div class="primer-giro texto-sect-1-home">
										<div class="segundo-giro">
											<p style="text-align: center;">2</p>
										</div>							
									</div>							
								</div>
								<div class="col-md-9 pasos-right-box2">
									<p>Sube una foto de el/los libros que quieras agregar a tu biblioteca </p>
									
								</div>
							</div>

						</div>
						
					</div>
					
				</div>
			</div>		
	</section>
	<!--************************** Seccion 3 **************************-->
<section class="main-section primer-giro" id="home-sec-3" style="">
		
			<div class="container-fluid segundo-giro">
				<div class="row" style="margin-left: 0px;margin-right:0px;">
					<div  class="col-md-1" ></div>
					<div class="col-md-5"  style="padding: 0px;z-index: 20!important;">
					

						<div class="pasos-left">
							
							<div class="row">
								<div class="col-md-3">
								<p style="color: white;font-size: 40px;font-family: 'Brandon_bold';">PASO</p>		
									<div class="primer-giro texto-sect-1-home">
										<div class="segundo-giro">
											<p style="text-align: center;">3</p>
										</div>							
									</div>							
								</div>
								<div class="col-md-8 pasos-left-box2">
									<p>Utiliza el buscador o mira en la sección de libros para enconrtar el que buscas.</p>
									
								</div>
							</div>

						</div>
						
					</div>

					<div class="col-md-6 animatable fadeInUp" style="padding-right: 0px;">
						 <img class="img-inicio-pasos-right"  src="images/pasos3.png">
						
							<!--<div class="img-palabra conten-img-lateral">
								<div class="img-palabra-3-lateral">
									<div class="layer"></div>
									<img class="img-home-libros"  src="img/foto-referencia-libros-3.jpg">
									
								</div>
							</div>-->
								    <!--<img class="img-home-semidestacado-inicio-lateral"  src="images/pasos2.png">-->

                            <div class="img-palabra-semi-lateral" >
								
				            </div>

						
						
					</div>

				</div>
			</div>		
	</section>
	<!--************************** Seccion 4 **************************-->
<section class="main-section-left primer-giro" id="home-sec-4">
		
			<div class="container-fluid segundo-giro">
				<div class="row" style="margin-left: 0px;margin-right:0px;">
					
					

					<div class="col-md-6 animatable fadeInUp" style="padding-left: 0px;">
						 <img class="img-inicio-pasos-left"  src="images/pasos4.png">
						
							

                            <div class="img-palabra-semi-lateral" >
								
				            </div>

						
						
					</div>
					<div  class="col-md-1" ></div>
					<div class="col-md-5"  style="padding: 0px;z-index: 20!important;">
						
						<div class="pasos-right">
							
							<div class="row">
								<div class="col-md-3">
								<p style="color: white;font-size: 40px;font-family: 'Brandon_bold';">PASO</p>		
									<div class="primer-giro texto-sect-1-home">
										<div class="segundo-giro">
											<p style="text-align: center;">4</p>
										</div>							
									</div>							
								</div>
								<div class="col-md-9 pasos-right-box2">
									<p>Sube una foto de el/los libros que <br>quieras agregar a tu biblioteca </p>
									
								</div>
							</div>

						</div>
						
					</div>
					
				</div>
			</div>		
	</section>
<!--************************** Seccion Libros **************************-->
	<section class="home-sec-libros  primer-giro">
		<!--main-section alabaster-start-->
		<div class="segundo-giro">
			<div class="container">
				<div class="row animatable fadeInUp">
					<div class="col-md-4 ">
                        <div class="texto-sect-2-home">
						<h3>MÁS</h3>
						<h2>POPULARES</h2>
                        </div>
						<!--PRIMERA IMAGEN-->
						<div class="img-palabra img-sect-2-home" >
							<div class="img-palabra-3" style="height: 400px;">
								
								<img class="img-home-destacado-inicio"  src="images/libro-destacado-inicio.jpg">
								
							</div>
						</div>
					</div>
					
					
					<div class="col-md-8">
						<div class="row col-md-12">
							<div class="col-md-6" style='padding:10px;'>
								<div class="img-palabra-semi" >
									<div class="img-palabra-3-semi" >	
										<img class="img-home-semidestacado-inicio"  src="images/libros/la odisea_2019-08-14.jpg">
									</div>
								</div>
							</div>
							<div class="col-md-6" style='padding:10px;'>
									<div class="img-palabra-semi" >
										<div class="img-palabra-3-semi">	
											<img class="img-home-semidestacado-inicio"  src="images/libro-destacado-2-inicio.jpg">
										</div>
									</div>
							</div>
							<div class="col-md-6" style='padding:10px;'>
									<div class="img-palabra-semi" >
										<div class="img-palabra-3-semi">	
											<img class="img-home-semidestacado-inicio"  src="images/libros/El día que se perdió la cordura_2019-08-30.jpg">
										</div>
									</div>
							</div>
							<div class="col-md-6" style='padding:10px;'>
								<div class="img-palabra-semi" >
									<div class="img-palabra-3-semi">	
										<img class="img-home-semidestacado-inicio"  src="images/libros/libro 1 admin_2019-08-11.jpg">
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="row" style="padding-top: 80px;">
					<a  href="{{ route('libros') }}" class="btn btn-largo">VER MÁS</a>
				</div>
				
			</div>
		</div>
	</section>
	<section class="container">
		<div class="row home-group-botones">
			<div class="col-md-3"></div>
			@guest
			<div class="col-md-3">
				<button type="button" class="btn btn-registro-fb-lg" ><i class="fab fa-facebook-f"></i> Regístrate con Facebook</button>	
			</div>
			<div class="col-md-3">
				<a data-toggle="modal" data-target="#myModal" type="button" style="color: white;" class="btn btn-registro-ce-lg "><i class="fas fa-envelope"></i> Regístrate con tu correo</a>
			</div>
			@endguest
			<div class="col-md-3"></div>
		</div>		
	</section>

@endsection
