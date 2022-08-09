@extends('layouts.app')

@section('template_title')
    {{ $artista->name ?? 'Mostrar Artista' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Artista</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('artistas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Artista:</strong>
                            {{ $artista->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset('storage').'/'.$artista->foto}}" width="100" alt=""> 
                        </div>
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ $artista->fechaNacimiento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
