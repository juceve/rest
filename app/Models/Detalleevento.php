<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detalleevento
 *
 * @property $id
 * @property $evento_id
 * @property $menu_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property Menu $menu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalleevento extends Model
{
    
    static $rules = [
		'evento_id' => 'required',
		'menu_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['evento_id','menu_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evento()
    {
        return $this->hasOne('App\Models\Evento', 'id', 'evento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'menu_id');
    }
    

}
