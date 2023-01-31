<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallelonchera
 *
 * @property $id
 * @property $item_id
 * @property $lonchera_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Item $item
 * @property Lonchera $lonchera
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detallelonchera extends Model
{
    
    static $rules = [
        'fecha' => 'required',
		'menu_id' => 'required',
		'lonchera_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','menu_id','lonchera_id','entregado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'menu_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lonchera()
    {
        return $this->hasOne('App\Models\Lonchera', 'id', 'lonchera_id');
    }
    

}
