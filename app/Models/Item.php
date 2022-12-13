<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $catitem_id
 * @property $imagen
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Catitem $catitem
 * @property Detallelonchera[] $detalleloncheras
 * @property Detallemenu[] $detallemenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Item extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'catitem_id' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','catitem_id','imagen','stock','precio','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catitem()
    {
        return $this->hasOne('App\Models\Catitem', 'id', 'catitem_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleloncheras()
    {
        return $this->hasMany('App\Models\Detallelonchera', 'item_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallemenuses()
    {
        return $this->hasMany('App\Models\Detallemenu', 'item_id', 'id');
    }
    

}
