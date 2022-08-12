<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Visita;
use App\Models\Genero;
use App\Models\Cancione;
use App\Models\Album;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generos = Genero::paginate();
        $artistas = Artista::paginate();
        $albums = Album::paginate();
        $canciones = Cancione::paginate();
        return view('welcome', compact('generos', 'artistas', 'albums', 'canciones'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function show(Visita $visita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function edit(Visita $visita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visita $visita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visita $visita)
    {
        //
    }
    public function search(Request $request)
    {
        //
        $term = $request->get('term');
        $querys = Cancione::where('nombre', 'LIKE','%'.$term. '%')->get();
        $data = [];
        foreach ($querys as $query) {
            # code...
            $data[] = [
                'label' => $query->nombre
            ];
        }
        return $data;
    }
    public function busqueda(Request $request)
    {
        $busqueda = request()->except(['_token']);
        $generos = Genero::paginate();
        $artistas = Artista::paginate();
        $albums = Album::paginate();
        $canciones = Cancione::paginate();
        $canciones2 = Cancione::paginate();
        return view('visita/busqueda', compact('generos', 'artistas', 'albums', 'canciones', 'canciones2', 'busqueda'));

    }
    
}
