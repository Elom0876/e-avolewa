<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function store()
    {
        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect('/panier')->with('error', 'Votre panier est vide !');
        }

        $total = 0;
        foreach ($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }

        $commande = Commande::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'statut' => 'en attente',
        ]);

        foreach ($panier as $id => $item) {
            $commande->produits()->attach($id, [
                'quantite' => $item['quantite'],
                'prix' => $item['prix'],
            ]);
        }

        session()->forget('panier');

        return redirect('/commandes')->with('success', 'Commande passée avec succès !');
    }

    public function index()
    {
        $commandes = Commande::where('user_id', Auth::id())
                            ->with('produits')
                            ->latest()
                            ->get();
        return view('commandes', compact('commandes'));
    }
}