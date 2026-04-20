@extends('layouts.app')

@section('title', $categorie->nom)

@section('content')

    <!-- Fil d'ariane -->
    <nav class="mb-4" style="font-size: 0.9rem;">
        <a href="/" class="text-muted text-decoration-none">
            <i class="fas fa-home me-1"></i>Accueil
        </a>
        <span class="mx-2 text-muted">/</span>
        <a href="/categories" class="text-muted text-decoration-none">Catégories</a>
        <span class="mx-2 text-muted">/</span>
        <span style="color: #E8A020;">{{ $categorie->nom }}</span>
    </nav>

    <!-- Header -->
    <div class="rounded-4 overflow-hidden position-relative mb-5"
         style="height: 200px;
                background: {{ $categorie->type == 'homme' ?
                    'linear-gradient(135deg, #1C0A00, #6B2D0A)' :
                    ($categorie->type == 'femme' ?
                    'linear-gradient(135deg, #C41E3A, #8B0000)' :
                    'linear-gradient(135deg, #2D6A4F, #1B4332)') }};">
        <div style="position: absolute; inset: 0;
                    background: repeating-linear-gradient(
                        45deg, rgba(232,160,32,0.05) 0px,
                        rgba(232,160,32,0.05) 2px,
                        transparent 2px, transparent 30px);">
        </div>
        <div class="d-flex align-items-center justify-content-center h-100 text-white position-relative"
             style="z-index: 1;">
            <div class="text-center">
                <div style="font-size: 3rem; margin-bottom: 10px;">
                    {{ $categorie->type == 'homme' ? '👔' : ($categorie->type == 'femme' ? '👗' : '👨‍👩‍👧‍👦') }}
                </div>
                <h1 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">
                    {{ $categorie->nom }}
                </h1>
                <p style="color: rgba(255,255,255,0.75); margin-bottom: 0;">
                    {{ $categorie->description }}
                </p>
            </div>
        </div>
    </div>

    @if($produits->isEmpty())
        <div class="text-center py-5">
            <div style="font-size: 5rem;">🎨</div>
            <h3 class="fw-bold mt-3 mb-2" style="color: #1C0A00;">
                Aucun pagne dans cette catégorie
            </h3>
            <p class="text-muted mb-4">
                Revenez bientôt, nous ajoutons de nouveaux pagnes régulièrement.
            </p>
            <a href="/categories" class="btn btn-lg rounded-pill px-5 py-3 fw-bold"
               style="background: linear-gradient(135deg, #E8A020, #F5A623);
                      color: white; border: none; transition: all 0.3s;"
               onmouseover="this.style.transform='translateY(-3px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <i class="fas fa-arrow-left me-2"></i>Retour aux catégories
            </a>
        </div>
    @else
        <div class="row g-4">
            @foreach($produits as $produit)
                <div class="col-md-4 col-sm-6">
                    <div class="product-card card h-100">
                        <div class="img-wrapper">
                            @if($produit->image)
                                <img src="{{ asset('storage/' . $produit->image) }}"
                                     alt="{{ $produit->nom }}">
                            @else
                                <div class="no-image-placeholder">🎨</div>
                            @endif
                            @if($produit->typePagne)
                                <div class="pagne-badge">{{ $produit->typePagne->nom }}</div>
                            @endif
                            <div class="overlay">
                                <a href="/produits/{{ $produit->id }}" class="overlay-btn">
                                    <i class="fas fa-eye"></i> Voir le pagne
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0" style="color: #1C0A00;">
                                    {{ $produit->nom }}
                                </h5>
                            </div>
                            @if($produit->couleur)
                                <p class="small mb-2" style="color: #6B2D0A;">
                                    <i class="fas fa-palette me-1"></i>{{ $produit->couleur }}
                                </p>
                            @endif
                            <p class="text-muted small mb-3">
                                {{ Str::limit($produit->description, 70) }}
                            </p>
                            @if($produit->longueurs->count() > 0)
                                <div class="d-flex gap-1 flex-wrap mb-3">
                                    @foreach($produit->longueurs as $longueur)
                                        <span class="badge rounded-pill px-2 py-1"
                                              style="background: #FFF3DC; color: #1C0A00;
                                                     font-size: 0.7rem; border: 1px solid #E8A020;">
                                            {{ $longueur->longueur }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-tag">
                                    @if($produit->longueurs->count() > 0)
                                        À partir de {{ number_format($produit->longueurs->min('prix'), 0, ',', ' ') }} FCFA
                                    @else
                                        {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                    @endif
                                </span>
                            </div>
                            <a href="/produits/{{ $produit->id }}" class="btn-view d-block">
                                <i class="fas fa-eye me-2"></i>Voir le pagne
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="/categories" class="btn rounded-pill px-5 py-3 fw-bold"
               style="border: 2px solid #1C0A00; color: #1C0A00; transition: all 0.3s;"
               onmouseover="this.style.background='#1C0A00'; this.style.color='white'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='transparent'; this.style.color='#1C0A00'; this.style.transform='translateY(0)'">
                <i class="fas fa-arrow-left me-2"></i>Retour aux catégories
            </a>
        </div>
    @endif

@endsection