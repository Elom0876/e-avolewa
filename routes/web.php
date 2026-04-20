<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ModeleController;

Route::get('/', function () {
    $produits = \App\Models\Produit::latest()->take(3)->get();
    return view('welcome', compact('produits'));
});

// Produits
Route::get('/produits', [ProduitController::class, 'index']);
Route::get('/produits/{id}', [ProduitController::class, 'show']);

// Panier
Route::get('/panier', [PanierController::class, 'index']);
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter']);
Route::get('/panier/supprimer/{cle}', [PanierController::class, 'supprimer'])->where('cle', '.*');

// Inscription
Route::get('/inscription', [AuthController::class, 'showInscription']);
Route::post('/inscription', [AuthController::class, 'inscription']);

// Connexion
Route::get('/connexion', [AuthController::class, 'showConnexion'])->name('login');
Route::post('/connexion', [AuthController::class, 'connexion']);

// Déconnexion
Route::post('/deconnexion', [AuthController::class, 'deconnexion']);

// Commandes
Route::middleware(['auth'])->group(function () {
    Route::post('/commandes', [CommandeController::class, 'store']);
    Route::get('/commandes', [CommandeController::class, 'index']);
});

// Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/produits/creer', [AdminController::class, 'creer']);
    Route::post('/produits/creer', [AdminController::class, 'stocker']);
    Route::get('/produits/modifier/{id}', [AdminController::class, 'modifier']);
    Route::post('/produits/modifier/{id}', [AdminController::class, 'mettreAJour']);
    Route::get('/produits/supprimer/{id}', [AdminController::class, 'supprimer']);
    Route::get('/commandes', [AdminController::class, 'commandes']);
    Route::post('/commandes/{id}/statut', [AdminController::class, 'updateStatut']);
    Route::get('/produits/{produit_id}/modeles', [ModeleController::class, 'index']);
    Route::get('/produits/{produit_id}/modeles/creer', [ModeleController::class, 'create']);
    Route::post('/produits/{produit_id}/modeles/creer', [ModeleController::class, 'store']);
    Route::get('/modeles/{id}/supprimer', [ModeleController::class, 'destroy']);
});
Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/categories/{id}', [CategorieController::class, 'show']);
