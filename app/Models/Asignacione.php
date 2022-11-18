<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignacione
 *
 * @property $id
 * @property $empleado_id
 * @property $empresa_id
 * @property $sucursale_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Empresa $empresa
 * @property Sucursale $sucursale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asignacione extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'empresa_id' => 'required',
		'sucursale_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','empresa_id','sucursale_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sucursale()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursale_id');
    }
    

}
