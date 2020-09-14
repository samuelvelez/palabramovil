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
            <div class="header-libros">
                <h2 style="letter-spacing: 2px;">Escribe un mensaje</h2>    
            </div>
            <div class="body-libros" style='padding:20px;margin-top: 0px;'>
             <div class="card " style="margin-top: 0px">
                <div class="card-body">
                    
                    <div class="header-sidebar">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/messages">Mis Mensajes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mensaje</li>
                              </ol>
                            </nav>  
                            <div class="row">
                                <div class="col-md-12">
                                        <form action="{{ route('messages.store') }}" method="post">
                                            {{ csrf_field() }}
                                            <!--<p>{{ $notificacions->id_libro }}</p>-->
                                            <div class="col-md-6">
                                                <!-- Subject Form Input -->
                                                <!--<div class="form-group">
                                                    <label class="control-label">Subject</label>
                                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                                           value="{{ old('subject') }}">
                                                </div>-->
                                                <!-- Message Form Input -->
                                                <input type="hidden" name="notificacion" value="{{$notificacions->id}}">
                                                <div class="form-group">
                                                    <!--<label class="control-label">Mensaje</label>-->
                                                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                                </div>
                                                @if($users->count() > 0)
                                                    <div class="checkbox" id="mensaje-usuario-destinario2">
                                                        @foreach($users as $user)
                                                            <label title="{{ $user->name }}"><input checked type="checkbox" name="recipients[]" readonly="readonly"
                                                                                                    value="{{ $user->id }}">{!!$user->name!!}</label>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <!-- Submit Form Input -->
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary form-control">Enviar Mensaje</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>                     
                            </div>
                    </div>               
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div style="padding:20px;"></div>
<!-- ************************************************************************ -->
</section>
@stop