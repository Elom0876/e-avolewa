<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = [
        'produit_id',
        'genre',
        'nom',
        'description',
        'image',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
