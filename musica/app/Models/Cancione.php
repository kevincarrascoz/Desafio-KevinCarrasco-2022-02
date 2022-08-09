<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cancione
 *
 * @property $id
 * @property $album_id
 * @property $artista_id
 * @property $genero_id
 * @property $nombre
 * @property $duracion
 * @property $created_at
 * @property $updated_at
 *
 * @property Album $album
 * @property Artista $artista
 * @property Genero $genero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cancione extends Model
{
    
    static $rules = [
		'album_id' => 'required',
		'artista_id' => 'required',
		'genero_id' => 'required',
		'nombre' => 'required',
		'duracion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['album_id','artista_id','genero_id','nombre','duracion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function album()
    {
        return $this->hasOne('App\Models\Album', 'id', 'album_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function artista()
    {
        return $this->hasOne('App\Models\Artista', 'id', 'artista_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }
    

}
