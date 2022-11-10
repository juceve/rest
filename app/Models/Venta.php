<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $fecha
 * @property $cliente
 * @property $estadopago_id
 * @property $importe
 * @property $created_at
 * @property $updated_at
 *
 * @property Estadopago $estadopago
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'cliente' => 'required',
		'estadopago_id' => 'required',
		'importe' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','cliente','estadopago_id','importe'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadopago()
    {
        return $this->hasOne('App\Models\Estadopago', 'id', 'estadopago_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'venta_id', 'id');
    }
    

}
