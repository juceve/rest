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
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['razonsocial', 'direccion', 'telefono', 'email', 'nit', 'avatar', 'responsable', 'telefono_responsable', 'estado'];

  public function sucursales()
    {
        return $this->hasMany('App\Models\Sucursale', 'empresa_id', 'id');
    }
}
