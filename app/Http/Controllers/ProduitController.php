<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->get('recherche');
        $typePagne = $request->get('type_pagne');
        $categorie = $request->get('categorie');

        $produits = Produit::with(['longueurs', 'typePagne', 'categorie'])
            ->when($recherche, function($query) use ($recherche) {
                $query->where('nom', 'like', '%' . $recherche . '%')
                      ->orWhere('description', 'like', '%' . $recherche . '%')
                      ->orWhere('couleur', 'like', '%' . $recherche . '%');
            })
            ->when($typePagne, function($query) use ($typePagne) {
                $query->where('type_pagne_id', $typePagne);
            })
            ->when($categorie, function($query) use ($categorie) {
                $query->where('categorie_id', $categorie);
            })
            ->get();

        return view('produits', compact('produits', 'recherche'));
    }

    public function show($id)
    {
        $produit = Produit::with([
            'modelesHomme',
            'modelesFemme',
            'modelesGarcon',
            'modelesFille',
            'longueurs',
            'categorie',
            'typePagne'
        ])->findOrFail($id);

        return view('produit-detail', compact('produit'));
    }
}