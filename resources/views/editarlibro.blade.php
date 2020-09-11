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
            <div class="header-libros" style="padding-top: 90px;">
            	<div style="padding-bottom: 30px;">
	            	<nav aria-label="breadcrumb" >
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="/biblioteca">Tu Biblioteca</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Editar libro</li>
					  </ol>
					</nav>
				</div>
                <h2 style="letter-spacing: 2px;">Edita tu Libro:</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card" style="margin-top: 0px">
                <div class="card-header">
                <p></p>
                </div>
                <div class="card-body">
               <form action="{{ route('libroupdate', Crypt::encrypt($libros->id)) }}" method="post" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									
									<div class="form-group">
										<label>Nombre:</label>
										<input type="text" name="titulo" id="titulo" class="form-control input-sm"  value="{{ $libros->titulo }}" >
									</div>
									<div class="form-group">
										<label>Autor:</label>
										<input type="text" name="autor" id="autor" class="form-control input-sm"  value="{{ $libros->autor }}" >
									</div>
									<div class="form-group">
										<label>Páginas:</label>
										<input type="text" name="paginas" id="paginas" class="form-control input-sm"  value="{{ $libros->paginas }}" >
									</div>
									<div class="form-group">
								<label>Descripción:</label>
								<textarea name="descripcion" rows="5" class="form-control input-sm" >{{ $libros->descripcion }}</textarea><!--readonly-->
							</div>

								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="mx-auto d-block" style="padding-top: 30px;padding-bottom: 30px;">
		                                <img style="width: 220px;" class="img-registro-destacado-inicio" style="object-fit:cover;" src="{{ $libros->imagen }}">
		                            </div>
									<div class="custom-file">
									  <input type="file" class="custom-file-input" accept="image/*"  name="imagen" id="imagen" lang="es" >
									  <label class="custom-file-label" for="imagen" data-browse="Bestand kiezen">Subir imagen del libro</label>
									</div>
								</div>
							</div>
							
                           <!--******************** LISTA GENEROS ********************-->
						   <div class="form-group">
						   <p style='font-size: 18px;margin-bottom:10px;'>Elige los géneros literios del libro :</p>
						   		
							</div>
							<!--******************** Fin GENEROS ********************-->
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-3">
									<input id="editar-btn" value="Editar" class="btn btn-secundario btn-block" >
								</div>	
								<div class="col-xs-12 col-sm-12 col-md-3">
									<input type="submit" id="actua-btn" style='background-color:#262C60;border-color:#262C60;' value="Actualizar" class="btn btn-success btn-block" disabled>
								</div>	
							</div>
				</form>
            </div>
              </div>


            </div>



        </div>
    </div>
</div>




<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
</section>



<script type="text/javascript">
$(document).ready(function () {
    $('#editar-btn').click(function() {
      $('#actua-btn').attr("disabled", false);	
      console.log('holas');
      
      
    });
});

</script>
@endsection