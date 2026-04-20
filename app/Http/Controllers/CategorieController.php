<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::withCount('produits')->get();
        return view('categories', compact('categories'));
    }

    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        $produits = Produit::where('categorie_id', $id)->get();
        return view('categorie-detail', compact('categorie', 'produits'));
    }
}
