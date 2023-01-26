<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    
    static $rules = [
		'recibo' => 'required',
		'tipopago_id' => 'required',
		'tipopago' => 'required',
		'importe' => 'required',
		'venta_id' => 'required',
        'estadopago_id' => 'required',		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['recibo','tipopago_id','tipopago','sucursal_id','sucursal','importe','estadopago_id','venta_id','user_id'];


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
