<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="{{asset('css/reproductor.css')}}">
        <link rel="stylesheet" href="{{asset('js/jquery-ui/jquery-ui.min.css')}}">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Inicio</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#generos">Resultado Busqueda</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#albums">Similares</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/e4a757106842361.5f99428d1aedd.jpg" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Música</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Descubre, elige y escucha dentro del catalogo de musica tus canciones favoritas y explora para escuchar a los artistas emergentes</p>
                <br>
                <form action="{{ route('visita.busqueda') }}"  method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="search" name="search" class="form-control" style="width: 700px;"/>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
                </div> 
                </form>
            </div>
            
        </header>
        @foreach ($busqueda as $busqueda)
        @foreach ($canciones as $canciones)
        @if($canciones->nombre==$busqueda)
        @php
        $generoBusqueda=$canciones->genero->nombre;
        @endphp
        
        <!-- Portfolio Section-->
        <section class="page-section portfolio " id="generos">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{$busqueda}}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                
                
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
                                                    @foreach ($artistas as $artistas)
                    @if($canciones->artista->nombre==$artistas->nombre)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto">
                            <div class="row justify-content-center" style="height: 250px; margin-top:150px;">
                            Artista:<br> {{$canciones->artista->nombre}}
                    <br>
                    Fecha de nacimiento:<br> {{$artistas->fechaNacimiento}}
                    <br>
                    Genero:
                    <br>
                    {{$canciones->genero->nombre}}
                    <br>
                    
                             </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto">
                            <div class="row justify-content-center" style="height: 250px; background-color: lightblue;margin-top:100px;">
                            <img class="img-fluid" src="{{asset('storage').'/'.$artistas->foto}}" alt="..." />
                             </div>
                            
                        </div>
                    </div>
                    
                    @endif
                    @endforeach
              
                

                
                    


                </div>
            </div>
        </section>
        @endif
        @endforeach
        
       

        <!-- Contact Section-->
        <section class="page-section portfolio " id="albums">
        <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Similares</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
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
                                   @foreach($canciones2 as $canciones2)
                                   @if($canciones2->genero->nombre=="$generoBusqueda" && !($canciones2->nombre==$busqueda))
                                    <tr>
                                            <td>
                                                <img src="{{asset('storage').'/'.$canciones2->foto}}" width="100" alt="" style="width: 100%; height: 100%">    
                                            </td>
                                            <td>{{ $canciones2->nombre }}</td>
											<td>{{ $canciones2->album->nombre }}</td>
                                            <td>{{ $canciones2->genero->nombre }}</td>
                                            
                                            <td><audio controls>
                                                    <source src="{{asset('storage').'/'.$canciones2->mp3}}" type="audio/mpeg">
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
                    


                </div>
            </div>
        </section>
        @endforeach
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                            Calle Falsa 123
                            <br />
                            Concepción, Chile
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Sobre Nosotros</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Herramientas Utilizadas</h4>
                        <p class="lead mb-0">
                        Laravel, Composer, Javascript, Bootstrap 
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2022</small></div>
        </div>
        <!-- Portfolio Modals-->
        

        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="{{asset('js/reproductor.js')}}"></script>
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
        <script>
            
            $('#search').autocomplete({
                source:function(request,response){
                    $.ajax({
                        url: "{{route('visita.search')}}",
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data){
                            response(data)
                        }
                    });
                }
            });
        </script>
        
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
