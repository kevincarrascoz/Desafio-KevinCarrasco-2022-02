@extends('layouts.template')


@section('generos')
    @foreach ($generos as $genero)
                                        <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModalGenero{{$genero->id}}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-play fa-3x"></i></div>
                            </div>
                            <div class="row justify-content-center" style="height: 100px; background-color: lightblue;">
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" style="display:flex;justify-content: center;align-items: center;">{{$genero->nombre}}</h2>
                             </div>
                            
                        </div>
                    </div>

                                        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModalGenero{{$genero->id}}" tabindex="-1" aria-labelledby="portfolioModalGenero{{$genero->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$genero->nombre}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                        
                                    <!-- Portfolio Modal - Text-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Album</th>
                                        <th>Artista</th>
                                        <th>Mp3</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($canciones as $cancion)
                                    @if($cancion->genero_id==$genero->id)
                                           
                                    <tr>
                                            <td>
                                                <img src="{{asset('storage').'/'.$cancion->foto}}" width="100" alt="" style="width: 100%; height: 100%">    
                                            </td>
                                            <td>{{ $cancion->nombre }}</td>
                                            <td>{{ $cancion->album->nombre }}</td>
											<td>{{ $cancion->artista->nombre }}</td>
                                            
                                            <td><audio controls>
                                                    <source src="{{asset('storage').'/'.$cancion->mp3}}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                    </audio>
                                            </td>
                                            </tr>

                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection


@section('artistas')
    @foreach ($artistas as $artistas)
                                        <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModalArtista{{$artistas->id}}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-play fa-3x"></i></div>
                            </div>
                            <div class="row justify-content-center" style="height: 250px; background-color: lightblue;">
                            <img class="img-fluid" src="{{asset('storage').'/'.$artistas->foto}}" alt="..." />
                             </div>
                            
                        </div>
                    </div>

                                        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModalArtista{{$artistas->id}}" tabindex="-1" aria-labelledby="portfolioModalArtista{{$artistas->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$artistas->nombre}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid" src="{{asset('storage').'/'.$artistas->foto}}" style="width: 80%;" alt="..."/>
                                    <!-- Portfolio Modal - Text-->
                                    <!-- Portfolio Modal - Text-->
                                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Album</th>
                                        <th>Genero</th>
                                        <th>Mp3</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($canciones as $cancion)
                                    @if($cancion->artista_id==$artistas->id)
                                    <tr>
                                            <td>
                                                <img src="{{asset('storage').'/'.$cancion->foto}}" width="100" alt="" style="width: 100%; height: 100%">    
                                            </td>
                                            <td>{{ $cancion->nombre }}</td>
											<td>{{ $cancion->album->nombre }}</td>
                                            <td>{{ $cancion->genero->nombre }}</td>
                                            
                                            <td><audio controls>
                                                    <source src="{{asset('storage').'/'.$cancion->mp3}}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                    </audio>
                                            </td>
                                            </tr>

                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                                   
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('albums')
    @foreach ($albums as $albums)
                                        <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModalAlbum{{$albums->id}}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-play fa-3x"></i></div>
                            </div>
                            <div class="row justify-content-center" style="height: 250px; background-color: lightblue;">
                            <img class="img-fluid" src="{{asset('storage').'/'.$albums->foto}}" alt="..." />
                             </div>
                            
                        </div>
                    </div>

                                        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModalAlbum{{$albums->id}}" tabindex="-1" aria-labelledby="portfolioModalAlbum{{$albums->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$albums->nombre}}</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid" src="{{asset('storage').'/'.$albums->foto}}" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Artista</th>
                                        <th>Genero</th>
                                        <th>Mp3</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($canciones as $cancion)
                                    @if($cancion->album_id==$albums->id)
                                    <tr>
                                            <td>
                                                <img src="{{asset('storage').'/'.$cancion->foto}}" width="100" alt="">    
                                            </td>
                                            <td>{{ $cancion->nombre }}</td>
											<td>{{ $cancion->artista->nombre }}</td>
                                            <td>{{ $cancion->genero->nombre }}</td>
                                            
                                            <td><audio controls>
                                                    <source src="{{asset('storage').'/'.$cancion->mp3}}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                    </audio>
                                            </td>
                                            </tr>

                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                                   
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('recomendados')
    @php
    $count = 0;
    @endphp
    @foreach ($canciones as $canciones)
    @break($count == 3)
                                        <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto">
                            <!-- <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            </div>
                            <div class="row justify-content-center" style="height: 450px ;background-color: white;">
                            <img class="img-fluid" src="{{asset('storage').'/'.$canciones->foto}}" alt="..." style="height: 250px;"/>
                            <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$canciones->nombre}}</h4>
                            <h5 class="portfolio-modal-title text-secondary text-uppercase mb-0">Artista: {{$canciones->artista->nombre}}</h5>
                            <h5 class="portfolio-modal-title text-secondary text-uppercase mb-0">Genero: {{$canciones->genero->nombre}}</h5>
                            <audio controls>
                                                    <source src="{{asset('storage').'/'.$canciones->mp3}}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                    </audio>
                             </div>
                             -->

<div class="container">
   <div class="player">
     <div class="player__controls">
       <h5 class="player__title">{{$canciones->nombre}}</h5>
     </div>
     <div class="player__album">
       <img src="{{asset('storage').'/'.$canciones->foto}}" alt="Album Cover"  loading="lazy" />
     </div>
     <h2 class="player__artist">{{$canciones->artista->nombre}}</h2>
     <h4 class="player__song">Genero: {{$canciones->genero->nombre}}</h4>

     <input type="range" value="20" min="0" class="player__level" id="range" />
     <div class="audio-duration">
       <div class="start">00:00</div>
       <div class="end">{{$canciones->duracion}}</div>
     </div>

     <audio class="player__audio" controls id="audio{{$canciones->id}}">
       <source src="{{asset('storage').'/'.$canciones->mp3}}" type="audio/mpeg" />
     </audio>

     <div class="player__controls">
      

       <div class="player__btn  player__btn--medium blue play" id="play{{$canciones->id}}" tag="input">
         <i class="fas fa-play play-btn"></i>
         <i class="fas fa-pause pause-btn hide"></i>
       </div>

       
     </div>
 
 </div>
 </div>
                        </div>
                    </div>

                            
        
    @php
    $count++;
    @endphp
    @endforeach

@endsection