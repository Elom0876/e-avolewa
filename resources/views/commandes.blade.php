@extends('layouts.app')

@section('title', 'Mes Commandes')

@section('content')

    <!-- Header -->
    <div class="text-center py-4 mb-5">
        <h1 class="fw-bold" style="font-family: 'Playfair Display', serif;">
            📦 Mes Commandes
        </h1>
        <p class="text-muted">Suivez l'historique de vos commandes</p>
        <hr style="width: 60px; border: 2px solid #e94560; margin: 15px auto 0;">
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4 d-flex align-items-center">
            <i class="fas fa-check-circle me-2 fa-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($commandes->isEmpty())
        <!-- Aucune commande -->
        <div class="text-center py-5">
            <div style="font-size: 5rem;">📦</div>
            <h3 class="fw-bold mt-3 mb-2">Aucune commande pour le moment</h3>
            <p class="text-muted mb-4">Vous n'avez pas encore passé de commande.</p>
            <a href="/produits" class="btn btn-lg rounded-pill px-5 py-3 fw-bold"
               style="background: #e94560; color: white; border: none; transition: all 0.3s;"
               onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                <i class="fas fa-store me-2"></i>Commencer mes achats
            </a>
        </div>

    @else
        @foreach($commandes as $commande)
            <div class="bg-white rounded-4 shadow-sm mb-4 overflow-hidden"
                 style="transition: all 0.3s;"
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">

                <!-- Header commande -->
                <div class="d-flex justify-content-between align-items-center p-4"
                     style="background: #1a1a2e;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width: 45px; height: 45px; background: rgba(233,69,96,0.2);">
                            <i class="fas fa-box" style="color: #e94560;"></i>
                        </div>
                        <div>
                            <span class="text-white fw-bold d-block">
                                Commande #{{ $commande->id }}
                            </span>
                            <span class="text-white-50 small">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $commande->created_at->format('d/m/Y à H:i') }}
                            </span>
                        </div>
                    </div>
                    <span class="badge rounded-pill px-3 py-2"
                          style="background: #e94560; color: white; font-size: 0.85rem;">
                        <i class="fas fa-clock me-1"></i>{{ $commande->statut }}
                    </span>
                </div>

                <!-- Produits -->
                <div class="p-4">
                    @foreach($commande->produits as $produit)
                        <div class="d-flex align-items-center py-3"
                             style="border-bottom: 1px solid #f0f0f0;">
                            <div class="me-3 d-flex align-items-center justify-content-center rounded-3"
                                 style="width: 55px; height: 55px;
                                        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                                        font-size: 1.5rem; flex-shrink: 0;">
                                @if($produit->image)
                                    <img src="{{ asset('storage/' . $produit->image) }}"
                                         style="width: 55px; height: 55px;
                                                object-fit: cover; border-radius: 10px;">
                                @else
                                    📦
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">{{ $produit->nom }}</h6>
                                <span class="text-muted small">
                                    Quantité :
                                    <strong>{{ $produit->pivot->quantite }}</strong>
                                    &nbsp;|&nbsp;
                                    Prix unitaire :
                                    <strong style="color: #e94560;">
                                        {{ number_format($produit->pivot->prix, 0, ',', ' ') }} FCFA
                                    </strong>
                                </span>
                            </div>
                            <div class="text-end">
                                <span class="fw-bold" style="color: #1a1a2e; font-size: 1.05rem;">
                                    {{ number_format($produit->pivot->prix * $produit->pivot->quantite, 0, ',', ' ') }} FCFA
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Footer commande -->
                <div class="d-flex justify-content-between align-items-center px-4 py-3"
                     style="background: #f8f9ff;">
                    <div class="d-flex gap-3">
                        <span class="small text-muted">
                            <i class="fas fa-truck me-1" style="color: #e94560;"></i>
                            Livraison gratuite
                        </span>
                        <span class="small text-muted">
                            <i class="fas fa-box me-1" style="color: #e94560;"></i>
                            {{ $commande->produits->count() }} article(s)
                        </span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-muted small">Total :</span>
                        <span class="fw-bold fs-5" style="color: #e94560;">
                            {{ number_format($commande->total, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-center mt-4 mb-5">
            <a href="/produits" class="btn rounded-pill px-5 py-3 fw-bold"
               style="border: 2px solid #1a1a2e; color: #1a1a2e;
                      font-size: 1rem; transition: all 0.3s;"
               onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
                <i class="fas fa-store me-2"></i>Continuer mes achats
            </a>
        </div>
    @endif

@endsection