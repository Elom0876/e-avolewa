<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePagne extends Model
{
    protected $table = 'types_pagnes';

    protected $fillable = [
        'nom',
        'description',
        'origine',
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
