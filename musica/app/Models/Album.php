<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Album
 *
 * @property $id
 * @property $artista_id
 * @property $nombre
 * @property $foto
 * @property $fechaLanzamiento
 * @property $created_at
 * @property $updated_at
 *
 * @property Artista $artista
 * @property Cancione[] $canciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Album extends Model
{
    
    static $rules = [
		'artista_id' => 'required',
		'nombre' => 'required',
		'foto' => 'required',
		'fechaLanzamiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['artista_id','nombre','foto','fechaLanzamiento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function artista()
    {
        return $this->hasOne('App\Models\Artista', 'id', 'artista_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canciones()
    {
        return $this->hasMany('App\Models\Cancione', 'album_id', 'id');
    }
    

}
