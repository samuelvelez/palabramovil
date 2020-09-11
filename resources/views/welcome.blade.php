<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pabralab - Inicio</title>
        <!-- Fonts 
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        @extends('layouts.metadatos')
    </head>
    <body>
	<header class="header hidden-xs hidden-sm" id="header" >

			<nav class="navbar" id="header-interno">
					<div class="container">
					  <div class="navbar-header">
						<img style="width: 300px;" src="images/logo-palabralab-blanco.png">
					  </div>
					  <ul class="nav navbar-nav">
						<!-- MENU PERFIL -->
						<!--<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
							</ul>
						</li>-->
						</ul>
						<form class="navbar-form navbar-right form-ingreso" action="/action_page.php">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Usuario">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Contraseña">
							</div>
							<button type="submit" class="btn btn-iniciosesion">INICIAR SESIÓN</button>
						  </form>
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a href="{{ url('/home') }}">Home</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
					</div>
				  </nav>
		<!--header-start-->
	</header>
    <!-- NAV MOBILE -->
            <!--<nav class="hidden-md hidden-lg navbar navbar-default" id="menu-only-movil" role="navigation" style="margin-bottom: 0px">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                          <span class="sr-only">Desplegar navegación</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Logotipo</a>
                      </div>
                      <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="#">Inicio</a></li>
                          <li><a href="#">Conoce Más</a></li>
                          <li><a href="#">Unete a la Iniciativa</a></li>
                          <li><a href="#">Palabra Lab</a></li>
                          <li><a href="#">Ingreso</a></li>
                        </ul>

                        <form class="navbar-form navbar-left" role="search">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Busca un libro género o autor">
                          </div>
                          <button type="submit" class="btn btn-default">Buscar</button>
                        </form>

                      </div>
            </nav>-->

			@extends('layouts.app')
	<!--header-end-->
	<div class="container-fluid contenedor-slider" >
	<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
		<div class="item active">
		  <!--<img src="img/INICIO-FONDO.png" alt="Los Angeles" style="width:100%;">-->
		  	<div class="col-md-6 col-sm-6 hidden-xs hidden-sm">
				<img src="images/BANNER-1-INICIO-min.png">
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="contenedor-slider-inside" >
					<p class="texto-slider">Alguien tiene el libro que buscas,<br><span class="text-bold-inside">alguien busca el libro que tienes</span></p>
					<div class="buscador-slider">
						<form class="buscador-inicio-form" action="#" method="GET"> 
							<div class="row">
							<div class="col-xs-12 col-sm-12">
								<div class="input-group">
								<input type="text" class="form-control" placeholder="Busca un libro, género o autor/a" id="txtSearch"/>
								<div class="input-group-btn">
									<button class="btn btn-color-palabra" type="submit">
									<span class="fa fa-search"></span>
									</button>
								</div>
								</div>
							</div>
							</div>
						</form>
						<form class="form-inline registro-inicio-form" action="/action_page.php">
							<div class="form-group col-md-4" style="background-color: white">
							<input type="email" placeholder="Usuario" class="form-control"  style="background-color: white;border-color: white;color:gray" id="email">
							</div>
							<div class="form-group col-md-4" style="background-color: #fcc65a">
							<input type="password" placeholder="Contraseña" style="background-color: #fcc65a;border-color: #fcc65a;color:gray;" class="form-control" id="pwd">
							</div>
							<button type="submit" class="btn col-md-4" style="background-color: #262c60;color:white;">Crea tu cuenta</button>
						</form> 
					</div>
				</div>
			</div>
		</div>
		<div class="item">
		   <div class="col-md-6">
				<img src="images/BANNER-1-INICIO-min.png">
			</div>
			<div class="col-md-6">
				<div class="contenedor-slider-inside">
					<ul class="we-create animated fadeInUp delay-1s">
						<li>Alguien tiene el libro que buscas,<br>alguien busca el libro que tienes</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="item">
		   <div class="col-md-6">
				<img src="images/BANNER-1-INICIO-min.png">
			</div>
			<div class="col-md-6">
				<div class="contenedor-slider-inside">
					<ul class="we-create animated fadeInUp delay-1s">
						<li>Alguien tiene el libro que buscas,<br>alguien busca el libro que tienes</li>
					</ul>
				</div>
			</div>
		</div>
	  </div>
  
	  <!-- Left and right controls 
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	  </a>-->
	</div>
  </div>

	<nav class="main-nav-outer nav-inferior hidden-xs hidden-sm" id="test" >
		<!--main-nav-start-->
		<div class="container">
			<ul class="main-nav">
				<li><a href="#" >Inicio</a></li>
				<li><a href="#" class="active">Conoce Más</a></li>
				<li><a href="#">Noticias</a></li>
				<li><a href="#">Palabra Lab</a></li>
				<!--<li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>-->
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	<!--main-nav-end-->



	<section class="main-section primer-giro" id="service" style="background-color: #fcc65a">
		
			<div class="container-fluid segundo-giro">
				<div class="row" style="margin-left: 0px;margin-right:0px;">
					<div class="col-md-4" style="padding-left: 0px;z-index: 20!important;">
						<div class="primer-giro texto-sect-1-home">
							<div class="segundo-giro class-padre">
								<div class="class-hijo">
										<p>AQUÍ PUEDES</p>
										<p><span>COMPARTIR</span></p>
										<p><span class="tus-libros">TUS LIBROS</span></p>
								</div>		
							</div>							
						</div>						
					</div>
					<div class="col-md-8" style="padding-right: 0px;">
						<div class="texto-sect-1-home-img">
							<!--<div class="img-palabra conten-img-lateral">
								<div class="img-palabra-3-lateral">
									<div class="layer"></div>
									<img class="img-home-libros"  src="img/foto-referencia-libros-3.jpg">
									
								</div>
							</div>-->
                            <div class="img-palabra-semi-lateral">
								<div class="img-palabra-3-semi-lateral">	
								    <img class="img-home-semidestacado-inicio-lateral"  src="images/foto-referencia-libros-3.jpg">
								</div>
				            </div>
						</div>
					</div>
					
	
				</div>
			</div>
		
	</section>
		<!--main-section-end-->


	<section class="main-section alabaster primer-giro">
		<!--main-section alabaster-start-->
		<div class="segundo-giro">
			<div class="container">
				<div class="row">
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
							<div class="col-md-6">
								<div class="img-palabra-semi" >
									<div class="img-palabra-3-semi" >	
										<img class="img-home-semidestacado-inicio"  src="images/libro-destacado-2-inicio.jpg">
									</div>
								</div>
							</div>
							<div class="col-md-6">
									<div class="img-palabra-semi" >
										<div class="img-palabra-3-semi">	
											<img class="img-home-semidestacado-inicio"  src="images/libro-destacado-2-inicio.jpg">
										</div>
									</div>
							</div>
							<div class="col-md-6">
									<div class="img-palabra-semi" >
										<div class="img-palabra-3-semi">	
											<img class="img-home-semidestacado-inicio"  src="images/libro-destacado-2-inicio.jpg">
										</div>
									</div>
							</div>
							<div class="col-md-6">
								<div class="img-palabra-semi" >
									<div class="img-palabra-3-semi">	
										<img class="img-home-semidestacado-inicio"  src="images/libro-destacado-2-inicio.jpg">
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="row" style="padding-top: 80px;">
					<button type="submit" class="btn btn-largo">VER MÁS</button>
				</div>
			</div>
		</div>
		
	</section>
	<!--main-section alabaster-end-->
	<section style="background: #f18835;height: 160px;margin-top: -80px;">
		<!--main-section alabaster-start-->
		
	</section>




	<!--<footer class="footer">
		<div class="container">
			<span class="copyright">&copy; Knight Theme. All Rights Reserved</span>
		</div>
	</footer>-->


	<script type="text/javascript">
		$(document).ready(function(e) {

			$('#test').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false

			});

      $('.Portfolio-box').magnificPopup({
        delegate: 'a',
        type: 'image'
      });

		});
	</script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>

	<script type="text/javascript">
		$(window).load(function() {

			$('.main-nav li a, .servicelink').bind('click', function(event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		$(window).load(function() {


			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;


			$container.isotope({
				// disable window resizing
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function() {
				// check if columns has changed
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					// set new column count
					columns = currentColumns;
					// apply width to container manually, then trigger relayout
					$container.width(columns * colW)
						.isotope('reLayout');
				}

			}).smartresize(); // trigger resize to set container width
			$('.portfolioFilter a').click(function() {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({

					filter: selector,
				});
				return false;
			});

		});
	</script>
	<script>
			window.onscroll = function changeClass(){
				
				var scrollPosY = window.pageYOffset | document.body.scrollTop;
				
				if(scrollPosY > 500) {
					
					/*document.getElementById('test').className = 'clase-agregada-nav';	*/		
					document.getElementById('header-interno').style.display='none';
					
				}else if(scrollPosY < 6){
					
					/*document.getElementById('test').className = 'clase-agregada-nav-2';	*/
					document.getElementById('header-interno').style.display='block';	
				}
			};
	</script>
</body>
</html>
