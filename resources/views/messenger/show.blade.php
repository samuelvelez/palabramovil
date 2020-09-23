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
            <div class="header-libros-msn">
                   
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                  @include('layouts.menudashboard')
                </div>
                <div class="card-body">
                    <div class="header-sidebar">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/messages">Mis Mensajes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mensaje</li>
                              </ol>
                            </nav>  
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        
                            <button class="btn btn-desactivado" data-toggle="modal" data-target="#create-1" >Finalizar conversación</button>
                        
                        </div>
                        <p></p>
                        @each('messenger.partials.messages', $thread->messages, 'message')
                        @include('messenger.partials.form-message')
                </div>
              </div>


            </div>



        </div>
    </div>
</div>




<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
</section>
 <!-- ********** MODAL *********** -->
<div class="modal fade" id="create-1">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#F18835;color:white;text-align:center;">
                    <h5 class="modal-title">¿Has terminado tu solicitud del libro?</h5>
                    <button type="button" class="btn btn-secundario" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Cerrar</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Al finalizar la solictud estas afirmando que el libro fue que solicitaste fue recibido y aceptado el acuerdo.</p>
                    <p>Si aún no has llegado a un acuerdo puedes cerrar el mensaje</p>
                    <form action="{{ route('confirmarPeticion') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="thread" value="{{$thread->id}}">
                        <hr style="color: #0056b2;" />
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"  value="aceptado"  name="check" id="check">
                            <label class="form-check-label" for="exampleCheck1">¿Deseas agregar el nuevo libro a tu biblioteca?</label>
                        </div>
                        <div class="form-group" style="padding-top: 20px;">
                          <button id="checkBtn" type="submit" class="btn btn-principal" >Finalizar solicitud</button>
                        </div>
                    </form>                                         
                </div>
            </div>
    </div>
</div>
<!-- ********** FIN MODAL *********** -->
<script type="text/javascript">
    /*
$(document).ready(function () {
  
    checked = $("input[type=radio]:checked").length; 
      
    $('input[type=radio]').on('change', function() {

        if ($(this).is(':checked') ) {
            
            $('#checkBtn').attr("disabled", false); 

            checked = $("input[type=radio]:checked").length; 
            
            if(checked == 0){
                
            }
        } else {
            
            checked = $("input[type=radio]:checked").length; 
            
            if(checked == 0){
                
                $('#checkBtn').attr("disabled", true);  
            }
        }
    });
});*/

</script>
@stop