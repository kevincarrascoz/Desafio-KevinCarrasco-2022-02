<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artista
 *
 * @property $id
 * @property $nombre
 * @property $foto
 * @property $fechaNacimiento
 * @property $created_at
 * @property $updated_at
 *
 * @property Album[] $albums
 * @property Cancione[] $canciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Artista extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'foto' => 'required',
		'fechaNacimiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','foto','fechaNacimiento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums()
    {
        return $this->hasMany('App\Models\Album', 'artista_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canciones()
    {
        return $this->hasMany('App\Models\Cancione', 'artista_id', 'id');
    }
    

}
