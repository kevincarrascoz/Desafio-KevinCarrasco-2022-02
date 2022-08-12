@extends('layouts.app')

@section('template_title')
    Update Album
@endsection

@section('content')
    <section class="content container-fluid">
    <form method="POST" action="{{ route('albums.update', $album->id) }}"  role="form" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

        
            <div class="form-group">
            {{ Form::label('artista') }}
            {{ Form::select('artista_id', $artistas, $album->artista_id, ['class' => 'form-control' . ($errors->has('artista_id') ? ' is-invalid' : ''), 'placeholder' => 'Artista']) }}
            {!! $errors->first('artista_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
        


            <div class="form-group">
            <label for="nombre"> nombre</label>  
            <input type="text" name="nombre"  value="{{isset($album->nombre)?$album->nombre:old('nombre')}}" id='nombre' class="form-control">
            </div>

            <div class="form-group">
            <label for="foto"> foto</label>  
            @if(isset($album->foto))
            <img src="{{asset('storage').'/'.$album->foto}}" alt="foto" width="100" class="img-thumbnail img-fluid" >
            @endif
            <input type="file" class="form-control" name="foto"  id='foto'>
            </div>

            <div class="form-group">
            <label for="fechaLanzamiento"> fechaLanzamiento</label>  
            <input type="date" name="fechaLanzamiento"  value="{{isset($album->fechaLanzamiento)?$album->fechaLanzamiento:old('fechaLanzamiento')}}" id='fechaLanzamiento' class="form-control">
            </div>

            <br>
            <div class="form-group">
            <input type="submit" value="guardar" class="btn btn-success">
            <a href="{{url('albums/')}}" class="btn btn-primary">Volver</a>
            </div>
</form>
    </section>
@endsection
