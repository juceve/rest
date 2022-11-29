<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Empresa extends Model
{
  use HasRoles;

  static $rules = [
    'razonsocial' => 'required',
    'direccion' => 'required',
    'telefono' => 'required',
    'email' => 'required|email',
    'nit' => 'required',
    'responsable' => 'required',
    'telefono_responsable' => 'required',
    'estado' => 'required',
    'moneda_id' => 'required',
  ];

  protected $perPage = 20;


  protected $fillable = ['razonsocial', 'direccion', 'telefono', 'email', 'nit', 'avatar', 'responsable', 'telefono_responsable', 'estado','moneda_id'];

  public function sucursales()
    {
        return $this->hasMany('App\Models\Sucursale', 'empresa_id', 'id');
    }
    public function users()
    {
        return $this->hasMany('App\Models\Users', 'empresa_id', 'id');
    }

   
    public function moneda()
    {
        return $this->hasOne(Moneda::class, 'id', 'moneda_id');
    }
}
