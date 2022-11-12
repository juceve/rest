<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sucursale
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Nivelcurso[] $nivelcursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sucursale extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'estado' => 'required',
        'empresa_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','telefono', 'empresa_id', 'tipo', 'estado'];

    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
    public function nivelcursos()
    {
        return $this->hasMany('App\Models\Nivelcurso', 'sucursale_id', 'id');
    }
    

}
