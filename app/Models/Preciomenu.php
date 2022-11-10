<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preciomenu
 *
 * @property $id
 * @property $nivelcurso_id
 * @property $tipomenu_id
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Nivelcurso $nivelcurso
 * @property Tipomenu $tipomenu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Preciomenu extends Model
{
    
    static $rules = [
		'nivelcurso_id' => 'required',
		'tipomenu_id' => 'required',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nivelcurso_id','tipomenu_id','precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivelcurso()
    {
        return $this->hasOne('App\Models\Nivelcurso', 'id', 'nivelcurso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipomenu()
    {
        return $this->hasOne('App\Models\Tipomenu', 'id', 'tipomenu_id');
    }
    

}
