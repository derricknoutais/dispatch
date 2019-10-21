<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $guarded = [];

    public function boissons()
    {
        return $this->belongsToMany('App\Boisson')->withPivot('quantité', 'id', 'quantité_livrée');
    }
}
