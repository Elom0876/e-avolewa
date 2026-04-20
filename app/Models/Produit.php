<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'stock',
        'categorie_id',
        'type_pagne_id',
        'couleur',
        'longueur',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function typePagne()
    {
        return $this->belongsTo(TypePagne::class);
    }

    public function modeles()
    {
        return $this->hasMany(Modele::class);
    }

    public function modelesHomme()
    {
        return $this->hasMany(Modele::class)->where('genre', 'homme');
    }

    public function modelesFemme()
    {
        return $this->hasMany(Modele::class)->where('genre', 'femme');
    }

    public function modelesGarcon()
    {
        return $this->hasMany(Modele::class)->where('genre', 'garcon');
    }

    public function modelesFille()
    {
        return $this->hasMany(Modele::class)->where('genre', 'fille');
    }
    public function longueurs()
    {
        return $this->hasMany(LongueurProduit::class);
    }
}
