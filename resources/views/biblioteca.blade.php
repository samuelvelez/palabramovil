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
                <h2 style="letter-spacing: 2px;">Libros de tu biblioteca</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
                <!--<div class="card-header">Resultados de busqueda:</div>-->
             <div class="card " style="margin-top: 0px">
                <div class="card-header">
                  @include('layouts.menudashboard')
                </div>
                <div class="card-body">
                <p> $libros </p>
                @if(is_null($libros)) 
                <div class="col-md-12">  
                    <p>No hay registro !!</p>
                </div>
                @else
                <div class="table-responsive ">
                <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Resumen</th>
                    <th>No. Páginas</th>
                    <th>Autor</th>
                    <th>Libro</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                    <tbody>   
                        @foreach($libros as $libro)  
                        <tr>
                            <td>{{$libro->titulo}}</td>
                            <td class="w-25">{{$libro->descripcion}}</td>
                            <td>{{$libro->paginas}}</td>
                            <td>{{$libro->autor}}</td>
                            <td><img style="width:100px;height:100px;" src="{{$libro->imagen}}"></td>
                            <td><a class="btn btn-primary btn-xs" href="{{ route('editarlibro',['id' => Crypt::encrypt($libro->id)]) }}" ><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                            <form action="{{ route('eliminarlogico',['id' => Crypt::encrypt($libro->id)]) }}" method="get">  
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</div>




<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
</section>

@endsection
