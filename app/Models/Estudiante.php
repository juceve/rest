<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $cedula
 * @property $telefono
 * @property $tutore_id
 * @property $curso_id
 * @property $verificado
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Lonchera[] $loncheras
 * @property Tutore $tutore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'nombre' => 'required',
		'cedula' => 'required',
		'tutore_id' => 'required',
		'curso_id' => 'required',
		'verificado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','cedula','telefono','tutore_id','curso_id','verificado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loncheras()
    {
        return $this->hasMany('App\Models\Lonchera', 'estudiante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tutore()
    {
        return $this->hasOne('App\Models\Tutore', 'id', 'tutore_id');
    }
    

}
