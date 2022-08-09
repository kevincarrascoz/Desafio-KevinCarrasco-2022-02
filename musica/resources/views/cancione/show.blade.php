@extends('layouts.app')

@section('template_title')
    {{ $cancione->name ?? 'Mostrar Cancione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Canciones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('canciones.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Album:</strong>
                            {{ $cancione->album->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Artista:</strong>
                            {{ $cancione->artista->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $cancione->genero->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Cancion:</strong>
                            {{ $cancione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $cancione->duracion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
