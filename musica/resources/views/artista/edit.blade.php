@extends('layouts.app')

@section('template_title')
    Update Artista
@endsection

@section('content')
    <section class="content container-fluid">
    <form method="POST" action="{{ route('artistas.update', $artista->id) }}"  role="form" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

            <div class="form-group">
            <label for="nombre"> nombre</label>  
            <input type="text" name="nombre"  value="{{isset($artista->nombre)?$artista->nombre:old('nombre')}}" id='nombre' class="form-control">
            </div>

            <div class="form-group">
            <label for="foto"> foto</label>  
            @if(isset($artista->foto))
            <img src="{{asset('storage').'/'.$artista->foto}}" alt="foto" width="100" class="img-thumbnail img-fluid" >
            @endif
            <input type="file" class="form-control" name="foto"  id='foto'>
            </div>
            
            <div class="form-group">
            <label for="fechaNacimiento"> fechaNacimiento</label>  
            <input type="text" name="fechaNacimiento"  value="{{isset($artista->fechaNacimiento)?$artista->fechaNacimiento:old('fechaNacimiento')}}" id='fechaNacimiento' class="form-control">
            </div>
            

            <br>
            <div class="form-group">
            <input type="submit" value="guardar" class="btn btn-success">
            <a href="{{url('artistas/')}}" class="btn btn-primary">Volver</a>
            </div>
</form>
    </section>
@endsection