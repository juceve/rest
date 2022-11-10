<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $recibo
 * @property $tipopago_id
 * @property $tipopago
 * @property $sucursal_id
 * @property $sucursal
 * @property $importe
 * @property $venta_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Lonchera[] $loncheras
 * @property User $user
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    
    static $rules = [
		'recibo' => 'required',
		'tipopago_id' => 'required',
		'tipopago' => 'required',
		'sucursal_id' => 'required',
		'sucursal' => 'required',
		'importe' => 'required',
		'venta_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['recibo','tipopago_id','tipopago','sucursal_id','sucursal','importe','venta_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loncheras()
    {
        return $this->hasMany('App\Models\Lonchera', 'pago_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'id', 'venta_id');
    }
    

}
