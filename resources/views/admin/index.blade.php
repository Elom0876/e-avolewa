@extends('layouts.app')

@section('title', 'Espace Admin')

@section('content')

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">
                👨‍💼 Espace Admin
            </h1>
            <p class="text-muted mb-0">Gérez vos produits facilement</p>
        </div>
        <div class="d-flex gap-2">
            <a href="/admin/commandes" class="btn rounded-pill px-4 py-2 fw-bold"
               style="border: 2px solid #1a1a2e; color: #1a1a2e; transition: all 0.3s;"
               onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
                <i class="fas fa-list me-2"></i>Commandes
            </a>
            <a href="/admin/produits/creer" class="btn rounded-pill px-4 py-2 fw-bold"
               style="background: #e94560; color: white; border: none; transition: all 0.3s;"
               onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                <i class="fas fa-plus me-2"></i>Ajouter un produit
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4 d-flex align-items-center">
            <i class="fas fa-check-circle me-2 fa-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats rapides -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 d-flex align-items-center gap-3"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">
                <div class="d-flex align-items-center justify-content-center rounded-3"
                     style="width: 55px; height: 55px; background: #fff0f3; flex-shrink: 0;">
                    <i class="fas fa-box fa-lg" style="color: #e94560;"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $produits->count() }}</h3>
                    <p class="text-muted mb-0 small">Produits au total</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 d-flex align-items-center gap-3"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">
                <div class="d-flex align-items-center justify-content-center rounded-3"
                     style="width: 55px; height: 55px; background: #f0fff4; flex-shrink: 0;">
                    <i class="fas fa-check-circle fa-lg" style="color: #28a745;"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $produits->where('stock', '>', 0)->count() }}</h3>
                    <p class="text-muted mb-0 small">Produits en stock</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 d-flex align-items-center gap-3"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">
                <div class="d-flex align-items-center justify-content-center rounded-3"
                     style="width: 55px; height: 55px; background: #fff8f0; flex-shrink: 0;">
                    <i class="fas fa-exclamation-triangle fa-lg" style="color: #fd7e14;"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-0">{{ $produits->where('stock', 0)->count() }}</h3>
                    <p class="text-muted mb-0 small">Rupture de stock</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau produits -->
    <div class="bg-white rounded-4 shadow-sm overflow-hidden">
        <div class="p-4" style="border-bottom: 2px solid #f0f0f0;">
            <h5 class="fw-bold mb-0">
                <i class="fas fa-list me-2" style="color: #e94560;"></i>
                Liste des produits
            </h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background: #f8f9ff;">
                    <tr>
                        <th class="px-4 py-3 text-muted small fw-600">IMAGE</th>
                        <th class="px-4 py-3 text-muted small fw-600">PRODUIT</th>
                        <th class="px-4 py-3 text-muted small fw-600">PRIX</th>
                        <th class="px-4 py-3 text-muted small fw-600">STOCK</th>
                        <th class="px-4 py-3 text-muted small fw-600">STATUT</th>
                        <th class="px-4 py-3 text-muted small fw-600">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                        <tr style="transition: all 0.3s;">
                            <td class="px-4 py-3">
                                @if($produit->image)
                                    <img src="{{ asset('storage/' . $produit->image) }}"
                                         style="width: 55px; height: 55px;
                                                object-fit: cover; border-radius: 10px;
                                                box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
                                @else
                                    <div class="d-flex align-items-center justify-content-center rounded-3"
                                         style="width: 55px; height: 55px;
                                                background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                                                font-size: 1.5rem;">
                                        📦
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <p class="fw-bold mb-0">{{ $produit->nom }}</p>
                                <p class="text-muted small mb-0">{{ Str::limit($produit->description, 40) }}</p>
                            </td>
                            <td class="px-4 py-3">
                                <span class="fw-bold" style="color: #e94560;">
                                    {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="fw-bold">{{ $produit->stock }}</span>
                            </td>
                            <td class="px-4 py-3">
                                @if($produit->stock > 0)
                                    <span class="badge rounded-pill px-3 py-2"
                                          style="background: #f0fff4; color: #28a745; font-size: 0.8rem;">
                                        <i class="fas fa-check-circle me-1"></i>En stock
                                    </span>
                                @else
                                    <span class="badge rounded-pill px-3 py-2"
                                          style="background: #fff0f3; color: #e94560; font-size: 0.8rem;">
                                        <i class="fas fa-times-circle me-1"></i>Rupture
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="/admin/produits/{{ $produit->id }}/modeles"
                                       class="btn rounded-pill px-3 py-1 small fw-500"
                                       style="background: #f0fff4; color: #28a745;
                                              border: none; transition: all 0.3s;"
                                       onmouseover="this.style.background='#28a745'; this.style.color='white'; this.style.transform='translateY(-2px)'"
                                       onmouseout="this.style.background='#f0fff4'; this.style.color='#28a745'; this.style.transform='translateY(0)'">
                                        <i class="fas fa-tshirt me-1"></i>Modèles
                                    </a>
                                    <a href="/admin/produits/modifier/{{ $produit->id }}"
                                       class="btn rounded-pill px-3 py-1 small fw-500"
                                       style="background: #fff8f0; color: #fd7e14;
                                              border: none; transition: all 0.3s;"
                                       onmouseover="this.style.background='#fd7e14'; this.style.color='white'; this.style.transform='translateY(-2px)'"
                                       onmouseout="this.style.background='#fff8f0'; this.style.color='#fd7e14'; this.style.transform='translateY(0)'">
                                        <i class="fas fa-edit me-1"></i>Modifier
                                    </a>
                                    <a href="/admin/produits/supprimer/{{ $produit->id }}"
                                       onclick="return confirm('Supprimer ce produit ?')"
                                       class="btn rounded-pill px-3 py-1 small fw-500"
                                       style="background: #fff0f3; color: #e94560;
                                              border: none; transition: all 0.3s;"
                                       onmouseover="this.style.background='#e94560'; this.style.color='white'; this.style.transform='translateY(-2px)'"
                                       onmouseout="this.style.background='#fff0f3'; this.style.color='#e94560'; this.style.transform='translateY(0)'">
                                        <i class="fas fa-trash me-1"></i>Supprimer
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection