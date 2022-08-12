<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Visita;
use App\Models\Genero;
use App\Models\Album;
use App\Models\Cancione;

class SearchController extends Controller
{
    //
    public function index()
    {
        //
        $generos = Genero::paginate();
        $artistas = Artista::paginate();
        $albums = Album::paginate();
        $canciones = Cancione::paginate();
        return view('welcome', compact('generos', 'artistas', 'albums', 'canciones'));
    }
}
