<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ArtistaController
 * @package App\Http\Controllers
 */
class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistas = Artista::latest()->paginate(5);

        return view('artista.index', compact('artistas'))
            ->with('i', (request()->input('page', 1) - 1) * $artistas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artista = new Artista();
        return view('artista.create', compact('artista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Artista::$rules);
        $artista = $request->except('_token');
        if($request->hasFile('foto')){
            $artista['foto']=$request->file('foto')->store('uploads','public');

        }
        Artista::insert($artista);
        
        return redirect()->route('artistas.index')->with('success', 'Artista created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artista = Artista::find($id);

        return view('artista.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista = Artista::find($id);

        return view('artista.edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Artista $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Artista::$rules);

        $datosArtista = request()->except(['_token','_method']);
        $artista=Artista::findOrFail($id);
        if($request->hasFile('foto')){
            $datosArtista['foto']=$request->file('foto')->store('uploads','public');
            Storage::delete('public/'.$artista->foto);
        }


        Artista::where('id','=',$id)->update($datosArtista);






        $campos=[
            'nombre'=>'required|string|max:100',
            'fechaNacimiento'=>'required|date|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es necesario'
        ];

        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }
        $this->validate($request, $campos, $mensaje);



        $datosArtista = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $artista=Artista::findOrFail($id);
            Storage::delete('public/'.$artista->foto);
            $datosArtista['foto']=$request->file('foto')->store('uploads','public');
        }


        Artista::where('id','=',$id)->update($datosArtista);

        $artista=Artista::findOrFail($id);



        return redirect()->route('artistas.index')
            ->with('success', 'Artista updated successfully');

        

        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $artista = Artista::find($id)->delete();

        return redirect()->route('artistas.index')
            ->with('success', 'Artista deleted successfully');
    }
}
