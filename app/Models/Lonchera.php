<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lonchera
 *
 * @property $id
 * @property $fecha
 * @property $estudiante_id
 * @property $pago_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Detallelonchera[] $detalleloncheras
 * @property Estudiante $estudiante
 * @property Pago $pago
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lonchera extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'estudiante_id' => 'required',
		'pago_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','estudiante_id','pago_id','habilitado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleloncheras()
    {
        return $this->hasMany('App\Models\Detallelonchera', 'lonchera_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pago()
    {
        return $this->hasOne('App\Models\Pago', 'id', 'pago_id');
    }
    

}
