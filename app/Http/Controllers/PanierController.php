<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\LongueurProduit;

class PanierController extends Controller
{
    public function index()
    {
        $panier = session()->get('panier', []);
        $total = 0;
        foreach ($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }
        return view('panier', compact('panier', 'total'));
    }

    public function ajouter(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $panier = session()->get('panier', []);

        $longueurId = $request->longueur_id;
        $quantite = $request->quantite ?? 1;
        $longueur = null;
        $prix = $produit->prix;

        if ($longueurId) {
            $longueur = LongueurProduit::findOrFail($longueurId);
            $prix = $longueur->prix;
        }

        $cle = $id . '_' . ($longueurId ?? 'default');

        if (isset($panier[$cle])) {
            $panier[$cle]['quantite'] += $quantite;
        } else {
            $panier[$cle] = [
                'produit_id' => $id,
                'nom' => $produit->nom,
                'prix' => $prix,
                'quantite' => $quantite,
                'longueur' => $longueur ? $longueur->longueur : null,
                'image' => $produit->image,
            ];
        }

        session()->put('panier', $panier);
        return redirect('/panier')->with('success', 'Produit ajouté au panier !');
    }

    public function supprimer($cle)
    {
        $panier = session()->get('panier', []);
        unset($panier[$cle]);
        session()->put('panier', $panier);
        return redirect('/panier');
    }
}
