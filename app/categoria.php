<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    //
     protected $fillable = ['nombre'];

    public function getRouteKeyName()
    {
        return 'id';
    }
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    } //
}
