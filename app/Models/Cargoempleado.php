<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargoempleado
 *
 * @property $id
 * @property $nombre
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargoempleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'cargoempleado_id', 'id');
    }
    

}
