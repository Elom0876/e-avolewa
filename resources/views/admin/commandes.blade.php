@extends('layouts.app')

@section('title', 'Gestion des Commandes')

@section('content')

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">
                📋 Gestion des Commandes
            </h1>
            <p class="text-muted mb-0">Gérez et suivez toutes les commandes</p>
        </div>
        <a href="/admin" class="btn rounded-pill px-4 py-2 fw-bold"
           style="border: 2px solid #1a1a2e; color: #1a1a2e; transition: all 0.3s;"
           onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
           onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
            <i class="fas fa-arrow-left me-2"></i>Retour admin
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <!-- Stats -->
    <div class="row mb-5">
        <div class="col-md-3 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 text-center"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
                <h3 class="fw-bold mb-0">{{ $commandes->count() }}</h3>
                <p class="text-muted small mb-0">Total commandes</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 text-center"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
                <h3 class="fw-bold mb-0" style="color: #fd7e14;">
                    {{ $commandes->where('statut', 'en attente')->count() }}
                </h3>
                <p class="text-muted small mb-0">En attente</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 text-center"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
                <h3 class="fw-bold mb-0" style="color: #28a745;">
                    {{ $commandes->where('statut', 'livrée')->count() }}
                </h3>
                <p class="text-muted small mb-0">Livrées</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="bg-white rounded-4 shadow-sm p-4 text-center"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
                <h3 class="fw-bold mb-0" style="color: #e94560;">
                    {{ number_format($commandes->sum('total'), 0, ',', ' ') }}
                </h3>
                <p class="text-muted small mb-0">FCFA total</p>
            </div>
        </div>
    </div>

    <!-- Liste commandes -->
    @if($commandes->isEmpty())
        <div class="text-center py-5">
            <div style="font-size: 5rem;">📋</div>
            <h3 class="fw-bold mt-3 mb-2">Aucune commande pour le moment</h3>
        </div>
    @else
        @foreach($commandes as $commande)
            <div class="bg-white rounded-4 shadow-sm mb-4 overflow-hidden"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center p-4"
                     style="background: #1a1a2e;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width: 45px; height: 45px; background: rgba(233,69,96,0.2);">
                            <i class="fas fa-shopping-bag" style="color: #e94560;"></i>
                        </div>
                        <div>
                            <span class="text-white fw-bold d-block">
                                Commande #{{ $commande->id }}
                            </span>
                            <span class="text-white-50 small">
                                <i class="fas fa-user me-1"></i>{{ $commande->user->name }}
                                &nbsp;|&nbsp;
                                <i class="fas fa-calendar me-1"></i>
                                {{ $commande->created_at->format('d/m/Y à H:i') }}
                            </span>
                        </div>
                    </div>

                    <!-- Changer statut -->
                    <form action="/admin/commandes/{{ $commande->id }}/statut" method="POST"
                          class="d-flex align-items-center gap-2">
                        @csrf
                        <select name="statut" class="form-select rounded-pill py-2 px-3"
                                style="border: none; font-size: 0.85rem; min-width: 160px;">
                            <option value="en attente" {{ $commande->statut == 'en attente' ? 'selected' : '' }}>
                                ⏳ En attente
                            </option>
                            <option value="confirmée" {{ $commande->statut == 'confirmée' ? 'selected' : '' }}>
                                ✅ Confirmée
                            </option>
                            <option value="en livraison" {{ $commande->statut == 'en livraison' ? 'selected' : '' }}>
                                🚚 En livraison
                            </option>
                            <option value="livrée" {{ $commande->statut == 'livrée' ? 'selected' : '' }}>
                                🎉 Livrée
                            </option>
                            <option value="annulée" {{ $commande->statut == 'annulée' ? 'selected' : '' }}>
                                ❌ Annulée
                            </option>
                        </select>
                        <button type="submit" class="btn rounded-pill px-3 py-2 fw-500"
                                style="background: #e94560; color: white; border: none;
                                       font-size: 0.85rem; transition: all 0.3s;"
                                onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                            <i class="fas fa-save me-1"></i>Sauvegarder
                        </button>
                    </form>
                </div>

                <!-- Produits -->
                <div class="p-4">
                    @foreach($commande->produits as $produit)
                        <div class="d-flex align-items-center py-2"
                             style="border-bottom: 1px solid #f0f0f0;">
                            <div class="me-3 d-flex align-items-center justify-content-center rounded-3"
                                 style="width: 50px; height: 50px; flex-shrink: 0;">
                                @if($produit->image)
                                    <img src="{{ asset('storage/' . $produit->image) }}"
                                         style="width: 50px; height: 50px;
                                                object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="width: 50px; height: 50px;
                                                background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                                                border-radius: 8px; display: flex;
                                                align-items: center; justify-content: center;
                                                font-size: 1.2rem;">📦</div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <p class="fw-bold mb-0 small">{{ $produit->nom }}</p>
                                <p class="text-muted mb-0" style="font-size: 0.8rem;">
                                    Qté: {{ $produit->pivot->quantite }}
                                    | Prix: {{ number_format($produit->pivot->prix, 0, ',', ' ') }} FCFA
                                </p>
                            </div>
                            <span class="fw-bold small" style="color: #e94560;">
                                {{ number_format($produit->pivot->prix * $produit->pivot->quantite, 0, ',', ' ') }} FCFA
                            </span>
                        </div>
                    @endforeach
                </div>

                <!-- Footer -->
                <div class="d-flex justify-content-between align-items-center px-4 py-3"
                     style="background: #f8f9ff;">
                    <span class="small text-muted">
                        <i class="fas fa-box me-1" style="color: #e94560;"></i>
                        {{ $commande->produits->count() }} article(s)
                    </span>
                    <div>
                        <span class="text-muted small me-2">Total :</span>
                        <span class="fw-bold fs-5" style="color: #e94560;">
                            {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection