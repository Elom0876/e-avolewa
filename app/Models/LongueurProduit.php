<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LongueurProduit extends Model
{
    protected $table = 'longueurs_produits';

    protected $fillable = [
        'produit_id',
        'longueur',
        'prix',
        'stock',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
