@extends('layouts.app')

@section('template_title')
    {{ $album->name ?? 'Mostrar Album' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Album</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('albums.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Artista:</strong>
                            {{ $album->artista->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Album:</strong>
                            {{ $album->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset('storage').'/'.$album->foto}}" width="100" alt=""> 
                        </div>
                        <div class="form-group">
                            <strong>Fecha de lanzamiento:</strong>
                            {{ $album->fechaLanzamiento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
