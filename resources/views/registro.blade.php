@extends('layouts.app')

@section('content')
<section class='fondo-base  primer-giro' >
<section class='segundo-giro' style="background: #f18835;height: 100px;margin-top: -90px;"></section>
<div class="container  segundo-giro" >
    <div class="row justify-content-center" >
    	<div class="col-md-8">
    	<div class="card">
        <div class="card-header">Bienvenido: {{ Auth::user()->name }}</div>
            <div class="card-body">
            	
	                <form method="POST" action="{{ route('persona.store') }}"  role="form" enctype="multipart/form-data">
	                {{ csrf_field() }}
	                <div class="registro-header-detalle"><h5>Completa el registro para poder participar en palabra movil:</h5>
	                	<!--<p style="font-style:300;"></p></div>-->
								<div class="row">
									
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="nombre" id="nombre" class="form-control input-sm"  autofocus="autofocus" placeholder="¿Cuál es tu nombre completo?" required>
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="number" name="edad" id="edad" class="form-control input-sm" min="12" max="100" placeholder="¿Cuál es tu Edad?" required>
										</div>
									</div>
								</div>
	                            <!--<div class="registro-header-detalle"><p></p></div>-->
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
	                         	<!--BNT ENVIO-->
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-3" style="margin-top: 20px;">
										<input type="submit" id="checkBtn" value="Bien, Continuemos" class="btn btn-principal" disabled>
									</div>	
								</div>
					</form>
				
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
   
	checked = $("input[type=checkbox]:checked").length;	
	console.log('okas');

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
