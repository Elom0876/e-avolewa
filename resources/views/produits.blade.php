@extends('layouts.app')

@section('title', 'Nos Pagnes')

@section('content')

    <!-- Header -->
    <div class="text-center py-4 mb-5">
        <h1 class="fw-bold section-title" style="font-family: 'Playfair Display', serif;">
            Notre Collection de Pagnes
        </h1>
        <div class="section-divider mx-auto"><span>🎨</span></div>
        <p class="text-muted mt-3">Découvrez nos pagnes authentiques de qualité supérieure</p>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <form action="/produits" method="GET">
            <div class="row g-3 align-items-end">

                <!-- Recherche -->
                <div class="col-md-4">
                    <label class="form-label fw-600 small" style="color: #1C0A00;">
                        <i class="fas fa-search me-2" style="color: #E8A020;"></i>Rechercher
                    </label>
                    <div class="input-group rounded-pill overflow-hidden"
                         style="border: 2px solid #eee;">
                        <input type="text" name="recherche"
                               class="form-control border-0 py-2 px-3"
                               placeholder="Nom, couleur, description..."
                               value="{{ $recherche ?? '' }}">
                        <button type="submit" class="btn px-4"
                                style="background: linear-gradient(135deg, #E8A020, #F5A623);
                                       color: white; border: none;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Filtre type pagne -->
                <div class="col-md-3">
                    <label class="form-label fw-600 small" style="color: #1C0A00;">
                        <i class="fas fa-layer-group me-2" style="color: #E8A020;"></i>Type de pagne
                    </label>
                    <select name="type_pagne" class="form-control rounded-3 py-2"
                            style="border: 2px solid #eee;">
                        <option value="">Tous les types</option>
                        @foreach(\App\Models\TypePagne::all() as $type)
                            <option value="{{ $type->id }}"
                                    {{ request('type_pagne') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtre catégorie -->
                <div class="col-md-3">
                    <label class="form-label fw-600 small" style="color: #1C0A00;">
                        <i class="fas fa-users me-2" style="color: #E8A020;"></i>Pour qui
                    </label>
                    <select name="categorie" class="form-control rounded-3 py-2"
                            style="border: 2px solid #eee;">
                        <option value="">Tout le monde</option>
                        @foreach(\App\Models\Categorie::all() as $categorie)
                            <option value="{{ $categorie->id }}"
                                    {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Bouton réinitialiser -->
                <div class="col-md-2">
                    <a href="/produits" class="btn w-100 rounded-pill py-2 fw-600"
                       style="border: 2px solid #1C0A00; color: #1C0A00; transition: all 0.3s;"
                       onmouseover="this.style.background='#1C0A00'; this.style.color='white'"
                       onmouseout="this.style.background='transparent'; this.style.color='#1C0A00'">
                        <i class="fas fa-times me-1"></i>Réinitialiser
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Résultats de recherche -->
    @if(isset($recherche) && $recherche)
        <div class="mb-4 p-3 rounded-3"
             style="background: #FFF3DC; border-left: 4px solid #E8A020;">
            <p class="mb-0 fw-600" style="color: #1C0A00;">
                <i class="fas fa-search me-2" style="color: #E8A020;"></i>
                Résultats pour : <strong>"{{ $recherche }}"</strong>
                — {{ $produits->count() }} pagne(s) trouvé(s)
                <a href="/produits" class="ms-3 small"
                   style="color: #E8A020; text-decoration: none; font-weight: 600;">
                    <i class="fas fa-times me-1"></i>Effacer
                </a>
            </p>
        </div>
    @endif

    <!-- Grille produits -->
    @if($produits->count() > 0)
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

                            <!-- Badge type -->
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
                            <!-- Nom et catégorie -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0" style="color: #1C0A00; font-size: 1rem;">
                                    {{ $produit->nom }}
                                </h5>
                                @if($produit->categorie)
                                    <span class="badge rounded-pill ms-2 flex-shrink-0"
                                          style="background: #FFF3DC; color: #6B2D0A; font-size: 0.65rem;">
                                        {{ $produit->categorie->nom }}
                                    </span>
                                @endif
                            </div>

                            <!-- Couleur -->
                            @if($produit->couleur)
                                <p class="small mb-2" style="color: #6B2D0A;">
                                    <i class="fas fa-palette me-1"></i>{{ $produit->couleur }}
                                </p>
                            @endif

                            <!-- Description -->
                            <p class="text-muted small mb-3" style="line-height: 1.6;">
                                {{ Str::limit($produit->description, 80) }}
                            </p>

                            <!-- Longueurs disponibles -->
                            @if($produit->longueurs->count() > 0)
                                <div class="mb-3">
                                    <p class="small fw-600 mb-1" style="color: #1C0A00;">
                                        <i class="fas fa-ruler me-1" style="color: #E8A020;"></i>
                                        Longueurs disponibles :
                                    </p>
                                    <div class="d-flex gap-1 flex-wrap">
                                        @foreach($produit->longueurs as $longueur)
                                            <span class="badge rounded-pill px-2 py-1"
                                                  style="background: #FFF3DC; color: #1C0A00;
                                                         font-size: 0.7rem; border: 1px solid #E8A020;">
                                                {{ $longueur->longueur }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Prix -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price-tag">
                                    @if($produit->longueurs->count() > 0)
                                        À partir de<br>
                                        <strong>{{ number_format($produit->longueurs->min('prix'), 0, ',', ' ') }} FCFA</strong>
                                    @else
                                        {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                    @endif
                                </span>
                                <span class="badge rounded-pill px-3 py-2"
                                      style="background: {{ $produit->stock > 0 ? '#f0fff4' : '#fff0f3' }};
                                             color: {{ $produit->stock > 0 ? '#28a745' : '#e94560' }};
                                             font-size: 0.75rem;">
                                    {{ $produit->stock > 0 ? '✓ En stock' : '✗ Rupture' }}
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
    @else
        <div class="text-center py-5">
            <div style="font-size: 5rem;">🎨</div>
            <h3 class="fw-bold mt-3 mb-2" style="color: #1C0A00;">Aucun pagne trouvé</h3>
            <p class="text-muted mb-4">Essayez avec d'autres critères de recherche.</p>
            <a href="/produits" class="btn rounded-pill px-5 py-3 fw-bold"
               style="background: linear-gradient(135deg, #E8A020, #F5A623);
                      color: white; border: none;">
                <i class="fas fa-times me-2"></i>Réinitialiser les filtres
            </a>
        </div>
    @endif

@endsection