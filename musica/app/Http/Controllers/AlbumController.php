<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class AlbumController
 * @package App\Http\Controllers
 */
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate();

        return view('album.index', compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * $albums->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = new Album();
        $artistas=Artista::pluck('nombre', 'id');
        return view('album.create', compact('album', 'artistas'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Album::$rules);
        $album = $request->except('_token');
        if($request->hasFile('foto')){
            $album['foto']=$request->file('foto')->store('uploads','public');

        }
        Album::insert($album);
        
        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return view('album.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        $artistas=Artista::pluck('nombre', 'id');
        return view('album.edit', compact('album', 'artistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Album::$rules);

        $datosAlbum = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $album=Album::findOrFail($id);
            Storage::delete('public/'.$album->foto);
            $datosAlbum['foto']=$request->file('foto')->store('uploads','public');
        }


        Album::where('id','=',$id)->update($datosAlbum);

        $album=Album::findOrFail($id);
        return redirect()->route('albums.index')
            ->with('success', 'Album updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $album = Album::find($id)->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Album deleted successfully');
    }
}
