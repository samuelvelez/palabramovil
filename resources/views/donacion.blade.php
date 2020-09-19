@extends('layouts.app2')
@section('content')

<!--<section class="agregalibros-registro " style="background-color:#F18835;padding-top: 1px;padding-bottom: 10px;">
		--main-section alabaster-start-
		<div class="" style="background-color: #F18835">
			<div class="container">
                <div class="row">
                    <div class="mx-auto">
                       
                    </div>                  
                </div>
			</div>
		</div>	
</section>-->

<section id="buscador" class="buscardor mt-5">
<form method="GET" action="http://localhost:8000/resultados" accept-charset="UTF-8" role="search" class="form-inline my-2 my-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="input-group ">
                    <input placeholder="Busca un libro, género o autor/a" name="name" type="text" class="form-control form-buscar-blanco-inicio">
                    <div class="input-group-append">
                        <button type="submit" class="btn" style="background-color: white; color: rgb(38, 44, 96);">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>

<section class="contenido mt-4 ">
    <div class="container bg_white mb-5">
        <div class="row p-5">
            <div class="col-sm-6">
            <img style="position:absolute;right:0;top:100px;height:100px" src="../images/donaciones.png">                  
            </div>
            <div class="col-sm-6 p-5 bg_darkblue c_white fs_20 text-justify">
            Es un espacio cultural que promueve la lectura desde 2010 y por este motivo, pensando en mediar entre libros y lectores comenzamos este proyecto.<br/>
            Agradecemos las donaciones que se han realizado y aceptamos gustosos los libros quq quieran donarpara hacer crecer esta iniciativa.
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 class="t_donacion ">Indicaciones Generales</h1>
            </div>
        </div>
        <div class="row p-5">
            <div class="col-sm-6 p-0">
                <div class="p3 bg_darkblue c_white  text-justify">
                    COMO DONANTE ACEPTA QUE SU DONACIÓN ES DEFINITIVA E IRREVERSIBLE Y QUE EN CONSECUENCIA EL MATERIAL 
                    DONADO PASE A SER PROPIEDAD LEGAL DE PALABRALAB.
                </div>
            </div>
            <div class="col-sm-6 p-0">
                <div class="p3 bg_darkblue c_white text-center">
                    NO SE ACEPTARÁN DONACIONES ANÓNIMAS.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div class="col-md-12">
                    <p class="b_orange p-4 bg_darkblue c_white text-center">LAS DONACIONES PODRÁN SER ACPETADAS O RECHAZADAS DEPENDIENDO
                    DEL <br />CUMPLIMIENTO DE LAS SIGUIENTES CONDICIONES:</p>
                </div>
            </div>
        </div>

        <div class="row p-5">
            <div class="col-sm-12 col-md-4 p-0">
                <div class="b_orange c_orange fs_20  h300 st_300 m-3 ">
                    MATERIALES QUE SUMAN A LA BIBLIOTECA:
                    
                </div>
            </div>
            <div class="col-sm-12 col-md-8 p-0">
                <div class="p-5 h300">
                    <h5 class="c_orange m-3">Nos interesan:</h5>
                    <ul class="fs_16 c_blue mb-4">
                        <li>LIBROS</li>
                        <li>CARTELES EDUCATIVOS O DIDACTICÓS</li>
                    </ul>

                    <p class="c_blue font-italic font-weight-light">Tambien aceptamos libros y otros documentos de actualidad (encuadernados y en buen estado).</p>
                </div>
            </div>
        </div>

        <div class="row p-5">
            <div class="col-sm-12 col-md-4 p-0">
                <div class="b_orange c_orange fs_20  h300 st_300 m-3 ">
                    MATERIALES QUE NO SUMAN A LA BIBLIOTECA:
                    
                </div>
            </div>
            <div class="col-sm-12 col-md-8 p-0">
                <div class="p-4 h300">
                <p class="c_blue font-italic font-weight-light">No se aceptará ningun libro o documento que se encuentre: roto, sucio, dañado, con humedad, mal encuadernado, con hongos y en mal estado de conservación.</p>
                <p class="c_blue font-italic font-weight-light">Por regla general no se aceptan documentos:</p>
                    <ul class="fs_16 c_blue mb-4 mt-3">
                        <li>FOTOCOPIADOS</li>
                        <li>LIBROS DE TEXTOS ESCOLARES</li>
                        <li>ANUARIOS, ESTADÍSTICAS, DIRECTORIOS, NI LIBROS TÉCNICOS O DE CARÁCTER CIENTÍFICO DE MAS DE 3 AÑOS DE EDICIÓN.</li>
                        <li>COLECCIONES DE PERIÓDICOS O REVISTAS QUE NO SEAN TEMÁTICA LOCAL, NI NÚMEROS SUELTOS QUE NO COMPLETEN LAS COLECCIONES.</li>
                    </ul>

                    
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 class="t_donacion ">Contacto</h1>
            </div>
        </div>
        <div class="row p-5">
            <div class="col-12 text-center bg_gray fs_20 c_white pl-5 pr-5 pt-3 pb-3">
                Si deseas contactarnos para hacer uan donación, y formar partw de esta iniciativa, o para solicitar material para tu biblioteca puedes escribir a ade@palabralab.com.
            </div>
        </div>
    </div>
</section>



@endsection
