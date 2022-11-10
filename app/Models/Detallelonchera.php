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
		'item_id' => 'required',
		'lonchera_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['item_id','lonchera_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item()
    {
        return $this->hasOne('App\Models\Item', 'id', 'item_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lonchera()
    {
        return $this->hasOne('App\Models\Lonchera', 'id', 'lonchera_id');
    }
    

}
