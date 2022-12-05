<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //
    protected $fillable = ['titulo', 'categoria_id', 'preparacion', 'ingredientes', 'user_id','imagen'];

    public function getRouteKeyName()
    {
        return 'id';
    }

     public function categoria()
    {
        return $this->belongsTo(categoria::class, 'categoria_id', 'id');
    }
    public function autor(){
        return $this->belongsTo(User::class,'user_id');//FK de la tabla user
    }

    //Like que ha recibido una receta
    public function likes(){                   //Tabla pivote
        return $this->belongsToMany(User::class,'likes_receta');
    }
}
