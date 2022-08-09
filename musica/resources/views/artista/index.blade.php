@extends('layouts.app')

@section('template_title')
    Artista
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Artista') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('artistas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Foto</th>
										<th>Fecha de nacimiento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artistas as $artista)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $artista->nombre }}</td>
											<td>
                                                <img src="{{asset('storage').'/'.$artista->foto}}" width="100" alt="">    
                                            </td>
											<td>{{ $artista->fechaNacimiento }}</td>

                                            <td>
                                                <form action="{{ route('artistas.destroy',$artista->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('artistas.show',$artista->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('artistas.edit',$artista->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $artistas->links() !!}
            </div>
        </div>
    </div>
@endsection
