@extends('layouts.app')
@section('content')
    <div class="container-fluid">
              <h1>Hola mundo</h1>
              <h1></h1>
              <h1></h1>
              @foreach ($artistas as $artista)
              {{$artista->nombre}}
              @endforeach

    </div>
            @endsection
    