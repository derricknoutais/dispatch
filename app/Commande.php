<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $guarded = [];

    public function boissons()
    {
        return $this->belongsToMany('App\Boisson')->withPivot('quantité', 'id', 'quantité_reçue');
    }
}
