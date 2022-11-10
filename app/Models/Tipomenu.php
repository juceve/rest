<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipomenu
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Menu[] $menuses
 * @property Preciomenu[] $preciomenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipomenu extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuses()
    {
        return $this->hasMany('App\Models\Menu', 'tipomenu_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preciomenuses()
    {
        return $this->hasMany('App\Models\Preciomenu', 'tipomenu_id', 'id');
    }
    

}
