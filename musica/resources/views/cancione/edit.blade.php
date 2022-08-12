@extends('layouts.app')

@section('template_title')
    Update Cancione
@endsection

@section('content')
    <section class="content container-fluid">
    <form method="POST" action="{{ route('canciones.update', $cancione->id) }}"  role="form" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
            {{ Form::label('Album') }}
            {{ Form::select('album_id', $albums, $cancione->album_id, ['class' => 'form-control' . ($errors->has('album_id') ? ' is-invalid' : ''), 'placeholder' => 'Album']) }}
            {!! $errors->first('album_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Artista') }}
            {{ Form::select('artista_id', $artistas, $cancione->artista_id, ['class' => 'form-control' . ($errors->has('artista_id') ? ' is-invalid' : ''), 'placeholder' => 'Artista']) }}
            {!! $errors->first('artista_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Genero') }}
            {{ Form::select('genero_id', $generos, $cancione->genero_id, ['class' => 'form-control' . ($errors->has('genero_id') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

            <div class="form-group">
            <label for="nombre"> nombre</label>  
            <input type="text" name="nombre"  value="{{isset($cancione->nombre)?$cancione->nombre:old('nombre')}}" id='nombre' class="form-control">
            </div>

            <div class="form-group">
            <label for="duracion"> duracion</label>  
            <input type="text" name="duracion"  value="{{isset($cancione->duracion)?$cancione->duracion:old('duracion')}}" id='duracion' class="form-control">
            </div>

            <div class="form-group">
            <label for="foto"> foto</label>  
            @if(isset($cancione->foto))
            <img src="{{asset('storage').'/'.$cancione->foto}}" alt="foto" width="100" class="img-thumbnail img-fluid" >
            @endif
            <input type="file" class="form-control" name="foto"  id='foto'>
            </div>

            <div class="form-group">
            <label for="mp3"> mp3</label> 
            <input type="file" name="mp3" value="{{isset($cancione->mp3)?$cancione->mp3:old('mp3')}}" id='mp3' class="form-control">
            </div>

            <br>
            <div class="form-group">
            <input type="submit" value="guardar" class="btn btn-success">
            <a href="{{url('canciones/')}}" class="btn btn-primary">Volver</a>
            </div>
</form>
    </section>
@endsection



