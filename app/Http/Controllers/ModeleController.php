<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Produit;

class ModeleController extends Controller
{
    public function create($produit_id)
    {
        $produit = Produit::findOrFail($produit_id);
        return view('admin.modeles.creer', compact('produit'));
    }

    public function store(Request $request, $produit_id)
    {
        $request->validate([
            'nom' => 'required',
            'genre' => 'required|in:homme,femme',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $imagePath = $request->file('image')->store('modeles', 'public');

        Modele::create([
            'produit_id' => $produit_id,
            'genre' => $request->genre,
            'nom' => $request->nom,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect('/admin/produits/' . $produit_id . '/modeles')
            ->with('success', 'Modèle ajouté avec succès !');
    }

    public function index($produit_id)
    {
        $produit = Produit::findOrFail($produit_id);
        $modeles = Modele::where('produit_id', $produit_id)->get();
        return view('admin.modeles.index', compact('produit', 'modeles'));
    }

    public function destroy($id)
    {
        $modele = Modele::findOrFail($id);
        $produit_id = $modele->produit_id;
        $modele->delete();
        return redirect('/admin/produits/' . $produit_id . '/modeles')
            ->with('success', 'Modèle supprimé !');
    }
}
