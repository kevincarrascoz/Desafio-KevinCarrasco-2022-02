<?php

namespace App\Http\Controllers;

use App\Models\Cancione;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CancioneController
 * @package App\Http\Controllers
 */
class CancioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canciones = Cancione::paginate(5);
        return view('cancione.index', compact('canciones'))
            ->with('i', (request()->input('page', 1) - 1) * $canciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cancione = new Cancione();
        $generos=Genero::pluck('nombre', 'id');
        $artistas=Artista::pluck('nombre', 'id');
        $albums=Album::pluck('nombre', 'id');

        return view('cancione.create', compact('cancione', 'generos', 'artistas', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cancione::$rules);
        $cancion = $request->except('_token');
        if($request->hasFile('foto')){
            $cancion['foto']=$request->file('foto')->store('uploads','public');

        }
        if($request->hasFile('mp3')){
            $cancion['mp3']=$request->file('mp3')->store('uploads','public');

        }
        Cancione::insert($cancion);
        
        return redirect()->route('canciones.index')->with('success', 'Cancion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancione = Cancione::find($id);

        return view('cancione.show', compact('cancione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancione = Cancione::find($id);
        $generos=Genero::pluck('nombre', 'id');
        $artistas=Artista::pluck('nombre', 'id');
        $albums=Album::pluck('nombre', 'id');

        return view('cancione.edit', compact('cancione', 'generos', 'artistas', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cancione $cancione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Cancione::$rules);

        $datosCancion = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $cancion=Cancione::findOrFail($id);
            Storage::delete('public/'.$cancion->foto);
            $datosCancion['foto']=$request->file('foto')->store('uploads','public');
        }

        if($request->hasFile('mp3')){
            $cancion=Cancione::findOrFail($id);
            Storage::delete('public/'.$cancion->mp3);
            $datosCancion['mp3']=$request->file('mp3')->store('uploads','public');
        }


        Cancione::where('id','=',$id)->update($datosCancion);

        $cancion=Cancione::findOrFail($id);
        return redirect()->route('canciones.index')
            ->with('success', 'Canciones updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cancione = Cancione::find($id)->delete();

        return redirect()->route('canciones.index')
            ->with('success', 'Cancione deleted successfully');
    }
}
