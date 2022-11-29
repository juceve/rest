<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'abreviatura' => 'required',
		'tasacambio' => 'required',
		'predeterminado' => 'required',
    ];

    protected $perPage = 20;

   
    protected $fillable = ['nombre','abreviatura','tasacambio','predeterminado'];

    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'moneda_id', 'id');
    }


}
