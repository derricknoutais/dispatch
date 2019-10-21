<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = ['nom'];
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function livraisons(){
        return $this->hasMany('App\Livraison');
    }

    public function commandes(){
        return $this->hasMany('App\Commande');
    }
}
