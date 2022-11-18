<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'cedula' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'email' => 'required|unique:empleados',
        'cargoempleado_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','cedula','direccion','telefono','fecnacimiento','email','sucursale_id','empresa_id','cargoempleado_id', 'avatar','user_id','estado'];

    public function asignaciones()
    {
        return $this->hasMany('App\Models\Asignacione', 'empleado_id', 'id');
    }
    
  
    public function cargoempleado()
    {
        return $this->hasOne('App\Models\Cargoempleado', 'id', 'cargoempleado_id');
    }
    
   
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
