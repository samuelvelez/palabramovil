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

<section id="libros-sec2" class="libros-img-fondo">
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-md-9" style="background-color: white;">
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Sube un libro:</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card" style="margin-top: 0px">
                <div class="card-header">
                  @include('layouts.menudashboard')
                </div>
                <div class="card-body">
               
               <form method="POST" action="{{ route('libro.store') }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="titulo" id="titulo" class="form-control input-sm"  autofocus="autofocus" placeholder="Titulo" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<!--<div class="form-group">
										<input accept="image/*" type="file" name="imagen" id="imagen" lang="es" required>
									</div>-->
									<div class="custom-file">
									  <input type="file" class="custom-file-input" accept="image/*"  name="imagen" id="imagen" lang="es" required>
									  <label class="custom-file-label" for="imagen" data-browse="Bestand kiezen">Subir imagen del libro</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="autor" id="autor" class="form-control input-sm"  autofocus="autofocus" placeholder="autor" required>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="paginas" id="paginas" class="form-control input-sm" placeholder="Número de paginas" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<textarea name="descripcion" rows="5" class="form-control input-sm" placeholder="Resumen" required></textarea>
							</div>
                           <!--******************** LISTA GENEROS ********************-->
						   <div class="form-group">
						   <p style='font-size: 18px;margin-bottom:10px;'>Elige los géneros literios del libro :</p>
						   		@foreach($generos as $genero)  
								<div class="form-check-inline">
									<label class="form-check-label" for="check1">
										<input type="checkbox" class="form-check-input" id="{{ $genero->id}}" name="my_checkbox[]" value="{{ $genero->id}}">{{ $genero->name}}
									</label>
								</div>
								@endforeach 
							</div>
							<!--******************** Fin GENEROS ********************-->
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-3">
									<input type="submit" id="checkBtn" style='background-color:#262C60;border-color:#262C60;' value="Subir" class="btn btn-success btn-block" disabled>
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
    /*$('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;
      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});*/
	checked = $("input[type=checkbox]:checked").length;	
	/*if(!checked) {
		console.log(checked);
        $('#checkBtn').attr("disabled", true);
        return false;
      }*/
      
	$('input[type=checkbox]').on('change', function() {

		if ($(this).is(':checked') ) {
			
			$('#checkBtn').attr("disabled", false);	

			checked = $("input[type=checkbox]:checked").length;	
			
			if(checked == 0){
				
			}
		} else {
			
			checked = $("input[type=checkbox]:checked").length;	
			
			if(checked == 0){
				
				$('#checkBtn').attr("disabled", true);	
			}
		}
	});
});

</script>
@endsection
