<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class AdminController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('admin.index', compact('produits'));
    }

    public function creer()
    {
        $categories = \App\Models\Categorie::all();
        $typesPagnes = \App\Models\TypePagne::all();
        return view('admin.creer', compact('categories', 'typesPagnes'));
    }

    public function stocker(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'categorie_id' => 'nullable|exists:categories,id',
            'type_pagne_id' => 'nullable|exists:types_pagnes,id',
            'couleur' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        $produit = Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $imagePath,
            'categorie_id' => $request->categorie_id,
            'type_pagne_id' => $request->type_pagne_id,
            'couleur' => $request->couleur,
        ]);

        // Enregistrer les longueurs
        if ($request->longueurs) {
            foreach ($request->longueurs as $longueur => $data) {
                if (isset($data['actif']) && $data['actif'] == 1) {
                    \App\Models\LongueurProduit::create([
                        'produit_id' => $produit->id,
                        'longueur' => $longueur,
                        'prix' => $data['prix'] ?? 0,
                        'stock' => $data['stock'] ?? 0,
                    ]);
                }
            }
        }

        return redirect('/admin')->with('success', 'Pagne ajouté avec succès !');
    }

    public function modifier($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = \App\Models\Categorie::all();
        return view('admin.modifier', compact('produit', 'categories'));
    }

    public function mettreAJour(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        $produit = Produit::findOrFail($id);

        $imagePath = $produit->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        $produit->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $imagePath,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect('/admin')->with('success', 'Produit modifié avec succès !');
    }

    public function supprimer($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect('/admin')->with('success', 'Produit supprimé avec succès !');
    }
    public function commandes()
    {
        $commandes = \App\Models\Commande::with(['user', 'produits'])
            ->latest()
            ->get();
        return view('admin.commandes', compact('commandes'));
    }

    public function updateStatut(Request $request, $id)
    {
        $commande = \App\Models\Commande::findOrFail($id);
        $commande->update(['statut' => $request->statut]);
        return redirect('/admin/commandes')->with('success', 'Statut mis à jour !');
    }
}
