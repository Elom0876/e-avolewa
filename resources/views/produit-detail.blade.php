@extends('layouts.app')

@section('title', $produit->nom)

@section('content')

    <!-- Fil d'ariane -->
    <nav class="mb-4" style="font-size: 0.9rem;">
        <a href="/" class="text-muted text-decoration-none">
            <i class="fas fa-home me-1"></i>Accueil
        </a>
        <span class="mx-2 text-muted">/</span>
        <a href="/produits" class="text-muted text-decoration-none">Produits</a>
        <span class="mx-2 text-muted">/</span>
        <span style="color: #e94560;">{{ $produit->nom }}</span>
    </nav>

    <!-- Détail produit -->
    <div class="row bg-white rounded-4 shadow-sm p-4 mb-5">

        <!-- Image -->
        <div class="col-md-6 mb-4">
            @if($produit->image)
                <img src="{{ asset('storage/' . $produit->image) }}"
                     class="rounded-4 w-100"
                     style="height: 450px; object-fit: cover;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                            transition: transform 0.4s ease;"
                     onmouseover="this.style.transform='scale(1.02)'"
                     onmouseout="this.style.transform='scale(1)'">
            @else
                <div class="rounded-4 d-flex align-items-center justify-content-center"
                     style="height: 450px; background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                            font-size: 5rem;">
                    🎨
                </div>
            @endif
        </div>

        <!-- Infos produit -->
        <div class="col-md-6 mb-4 d-flex flex-column justify-content-center ps-md-5">

            <!-- Badges -->
            <div class="d-flex gap-2 flex-wrap mb-3">
                @if($produit->typePagne)
                    <span class="badge rounded-pill px-3 py-2"
                          style="background: #fff3cd; color: #856404; font-size: 0.85rem;">
                        <i class="fas fa-tag me-1"></i>{{ $produit->typePagne->nom }}
                    </span>
                @endif
                @if($produit->categorie)
                    <span class="badge rounded-pill px-3 py-2"
                          style="background: #d1ecf1; color: #0c5460; font-size: 0.85rem;">
                        <i class="fas fa-layer-group me-1"></i>{{ $produit->categorie->nom }}
                    </span>
                @endif
                @if($produit->couleur)
                    <span class="badge rounded-pill px-3 py-2"
                          style="background: #f8d7da; color: #721c24; font-size: 0.85rem;">
                        <i class="fas fa-palette me-1"></i>{{ $produit->couleur }}
                    </span>
                @endif
            </div>

            <h1 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; font-size: 2rem;">
                {{ $produit->nom }}
            </h1>

            <p class="text-muted mb-4" style="line-height: 1.8;">
                {{ $produit->description }}
            </p>

            <!-- Formulaire ajout panier -->
            <form action="/panier/ajouter/{{ $produit->id }}" method="POST">
                @csrf

                <!-- Longueurs disponibles -->
                @if($produit->longueurs->count() > 0)
                    <div class="mb-4">
                        <label class="fw-bold mb-3 d-block">
                            <i class="fas fa-ruler me-2" style="color: #e94560;"></i>
                            Choisissez la longueur :
                        </label>
                        <div class="row g-2">
                            @foreach($produit->longueurs as $longueur)
                                <div class="col-6">
                                    <input type="radio" name="longueur_id"
                                           value="{{ $longueur->id }}"
                                           id="longueur_{{ $longueur->id }}"
                                           class="d-none longueur-radio"
                                           {{ $loop->first ? 'checked' : '' }}>
                                    <label for="longueur_{{ $longueur->id }}"
                                           class="longueur-card w-100 p-3 rounded-3 text-center"
                                           style="border: 2px solid #eee; cursor: pointer;
                                                  transition: all 0.3s; display: block;">
                                        <span class="fw-bold d-block" style="font-size: 1.1rem;">
                                            {{ $longueur->longueur }}
                                        </span>
                                        <span style="color: #e94560; font-weight: 700;">
                                            {{ number_format($longueur->prix, 0, ',', ' ') }} FCFA
                                        </span>
                                        <span class="d-block text-muted small mt-1">
                                            Stock: {{ $longueur->stock }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Prix de base si pas de longueurs -->
                    <div class="mb-4 p-3 rounded-3" style="background: #fff0f3;">
                        <span class="d-block fw-bold" style="color: #e94560; font-size: 2rem;">
                            {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                        </span>
                        <span class="text-muted small">
                            <i class="fas fa-box me-1"></i>
                            {{ $produit->stock }} en stock
                        </span>
                    </div>
                @endif

                <!-- Quantité -->
                <div class="mb-4">
                    <label class="fw-bold mb-2 d-block">
                        <i class="fas fa-sort-numeric-up me-2" style="color: #e94560;"></i>
                        Quantité :
                    </label>
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" onclick="decrementQty()"
                                class="btn rounded-circle fw-bold"
                                style="width: 40px; height: 40px; background: #f0f0f0;
                                       border: none; font-size: 1.2rem; transition: all 0.3s;"
                                onmouseover="this.style.background='#e94560'; this.style.color='white'"
                                onmouseout="this.style.background='#f0f0f0'; this.style.color='black'">
                            −
                        </button>
                        <input type="number" name="quantite" id="quantite" value="1" min="1" max="20"
                               class="form-control text-center fw-bold"
                               style="width: 80px; border: 2px solid #eee; border-radius: 12px;
                                      font-size: 1.1rem;">
                        <button type="button" onclick="incrementQty()"
                                class="btn rounded-circle fw-bold"
                                style="width: 40px; height: 40px; background: #f0f0f0;
                                       border: none; font-size: 1.2rem; transition: all 0.3s;"
                                onmouseover="this.style.background='#e94560'; this.style.color='white'"
                                onmouseout="this.style.background='#f0f0f0'; this.style.color='black'">
                            +
                        </button>
                    </div>
                </div>

                <!-- Bouton ajouter au panier -->
                <button type="submit" class="btn btn-lg w-100 rounded-pill py-3 fw-bold mb-3"
                        style="background: #1a1a2e; color: white; border: none;
                               font-size: 1rem; transition: all 0.3s;"
                        onmouseover="this.style.background='#e94560'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(233,69,96,0.4)'"
                        onmouseout="this.style.background='#1a1a2e'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <i class="fas fa-shopping-bag me-2"></i>Ajouter au panier
                </button>
            </form>
            <!-- Bouton WhatsApp -->
<a href="https://wa.me/2290167086533?text=Bonjour%20DKV'Sto%2C%20je%20suis%20intéressé%20par%20le%20pagne%20*{{ urlencode($produit->nom) }}*%20!%20Pouvez-vous%20me%20donner%20plus%20d'informations%20?"
   target="_blank"
   class="btn btn-lg w-100 rounded-pill py-3 fw-bold mb-3"
   style="background: linear-gradient(135deg, #25D366, #128C7E);
          color: white; border: none; font-size: 1rem;
          box-shadow: 0 8px 25px rgba(37,211,102,0.4);
          transition: all 0.3s;"
   onmouseover="this.style.transform='translateY(-3px)';
                this.style.boxShadow='0 15px 35px rgba(37,211,102,0.5)'"
   onmouseout="this.style.transform='translateY(0)';
               this.style.boxShadow='0 8px 25px rgba(37,211,102,0.4)'">
    <i class="fab fa-whatsapp me-2" style="font-size: 1.2rem;"></i>
    Commander via WhatsApp
</a>

            <a href="/produits" class="btn btn-lg w-100 rounded-pill py-3 fw-bold"
               style="border: 2px solid #1a1a2e; color: #1a1a2e;
                      font-size: 1rem; transition: all 0.3s;"
               onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
                <i class="fas fa-arrow-left me-2"></i>Retour aux produits
            </a>

            <!-- Garanties -->
            <div class="mt-4 p-3 rounded-3" style="background: #f8f9ff;">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-truck me-3" style="color: #e94560;"></i>
                    <span class="small">Livraison rapide à Cotonou</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-shield-alt me-3" style="color: #e94560;"></i>
                    <span class="small">Paiement 100% sécurisé</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-undo me-3" style="color: #e94560;"></i>
                    <span class="small">Retour facile sous 7 jours</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ========= SECTION MODÈLES ========= -->
    @php
        $hasModeles = $produit->modelesHomme->count() > 0 ||
                      $produit->modelesFemme->count() > 0 ||
                      $produit->modelesGarcon->count() > 0 ||
                      $produit->modelesFille->count() > 0;
        
        $categorieType = $produit->categorie ? $produit->categorie->type : null;
    @endphp

    @if($hasModeles)
    <div class="mb-5">

        <!-- Header section -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">
                ✨ Tenues réalisables avec ce pagne
            </h2>
            <p class="text-muted">Inspirez-vous de nos modèles</p>
            <hr style="width: 60px; border: 2px solid #e94560; margin: 15px auto 0;">
        </div>

        <!-- Onglets selon catégorie -->
        <div class="d-flex justify-content-center mb-5 flex-wrap gap-2">
            @if($categorieType == 'homme' || $categorieType == 'tout_le_monde')
                @if($produit->modelesHomme->count() > 0)
                    <button onclick="showModeles('homme')" id="btn-homme"
                            class="btn rounded-pill px-4 py-2 fw-bold genre-btn"
                            style="background: #1a1a2e; color: white; border: none; transition: all 0.3s;">
                        👔 Homme
                        <span class="badge ms-1" style="background: #e94560;">
                            {{ $produit->modelesHomme->count() }}
                        </span>
                    </button>
                @endif
                @if($produit->modelesGarcon->count() > 0)
                    <button onclick="showModeles('garcon')" id="btn-garcon"
                            class="btn rounded-pill px-4 py-2 fw-bold genre-btn"
                            style="background: transparent; color: #1a1a2e;
                                   border: 2px solid #1a1a2e; transition: all 0.3s;">
                        👦 Garçon
                        <span class="badge ms-1" style="background: #e94560;">
                            {{ $produit->modelesGarcon->count() }}
                        </span>
                    </button>
                @endif
            @endif

            @if($categorieType == 'femme' || $categorieType == 'tout_le_monde')
                @if($produit->modelesFemme->count() > 0)
                    <button onclick="showModeles('femme')" id="btn-femme"
                            class="btn rounded-pill px-4 py-2 fw-bold genre-btn"
                            style="background: transparent; color: #1a1a2e;
                                   border: 2px solid #1a1a2e; transition: all 0.3s;">
                        👗 Femme
                        <span class="badge ms-1" style="background: #e94560;">
                            {{ $produit->modelesFemme->count() }}
                        </span>
                    </button>
                @endif
                @if($produit->modelesFille->count() > 0)
                    <button onclick="showModeles('fille')" id="btn-fille"
                            class="btn rounded-pill px-4 py-2 fw-bold genre-btn"
                            style="background: transparent; color: #1a1a2e;
                                   border: 2px solid #1a1a2e; transition: all 0.3s;">
                        👧 Fille
                        <span class="badge ms-1" style="background: #e94560;">
                            {{ $produit->modelesFille->count() }}
                        </span>
                    </button>
                @endif
            @endif
        </div>

        <!-- Galerie modèles homme -->
        @if($produit->modelesHomme->count() > 0)
        <div id="modeles-homme" class="modeles-section">
            <div class="row g-4">
                @foreach($produit->modelesHomme as $modele)
                    <div class="col-md-4 col-sm-6">
                        <div class="rounded-4 overflow-hidden shadow-sm"
                             style="transition: all 0.4s;"
                             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)'"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)'">
                            <div style="height: 420px; overflow: hidden; position: relative;">
                                <img src="{{ asset('storage/' . $modele->image) }}"
                                     style="width: 100%; height: 100%; object-fit: cover;
                                            transition: transform 0.6s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                                <div style="position: absolute; bottom: 0; left: 0; right: 0;
                                            background: linear-gradient(transparent, rgba(26,26,46,0.9));
                                            padding: 30px 20px 20px;">
                                    <span class="badge rounded-pill px-3 py-2 mb-2"
                                          style="background: rgba(233,69,96,0.9);">
                                        👔 Homme
                                    </span>
                                    <h5 class="fw-bold text-white mb-1">{{ $modele->nom }}</h5>
                                    @if($modele->description)
                                        <p class="text-white-50 small mb-0">{{ $modele->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Galerie modèles garçon -->
        @if($produit->modelesGarcon->count() > 0)
        <div id="modeles-garcon" class="modeles-section" style="display:none;">
            <div class="row g-4">
                @foreach($produit->modelesGarcon as $modele)
                    <div class="col-md-4 col-sm-6">
                        <div class="rounded-4 overflow-hidden shadow-sm"
                             style="transition: all 0.4s;"
                             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)'"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)'">
                            <div style="height: 420px; overflow: hidden; position: relative;">
                                <img src="{{ asset('storage/' . $modele->image) }}"
                                     style="width: 100%; height: 100%; object-fit: cover;
                                            transition: transform 0.6s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                                <div style="position: absolute; bottom: 0; left: 0; right: 0;
                                            background: linear-gradient(transparent, rgba(26,26,46,0.9));
                                            padding: 30px 20px 20px;">
                                    <span class="badge rounded-pill px-3 py-2 mb-2"
                                          style="background: rgba(233,69,96,0.9);">
                                        👦 Garçon
                                    </span>
                                    <h5 class="fw-bold text-white mb-1">{{ $modele->nom }}</h5>
                                    @if($modele->description)
                                        <p class="text-white-50 small mb-0">{{ $modele->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Galerie modèles femme -->
        @if($produit->modelesFemme->count() > 0)
        <div id="modeles-femme" class="modeles-section" style="display:none;">
            <div class="row g-4">
                @foreach($produit->modelesFemme as $modele)
                    <div class="col-md-4 col-sm-6">
                        <div class="rounded-4 overflow-hidden shadow-sm"
                             style="transition: all 0.4s;"
                             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)'"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)'">
                            <div style="height: 420px; overflow: hidden; position: relative;">
                                <img src="{{ asset('storage/' . $modele->image) }}"
                                     style="width: 100%; height: 100%; object-fit: cover;
                                            transition: transform 0.6s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                                <div style="position: absolute; bottom: 0; left: 0; right: 0;
                                            background: linear-gradient(transparent, rgba(26,26,46,0.9));
                                            padding: 30px 20px 20px;">
                                    <span class="badge rounded-pill px-3 py-2 mb-2"
                                          style="background: rgba(233,69,96,0.9);">
                                        👗 Femme
                                    </span>
                                    <h5 class="fw-bold text-white mb-1">{{ $modele->nom }}</h5>
                                    @if($modele->description)
                                        <p class="text-white-50 small mb-0">{{ $modele->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Galerie modèles fille -->
        @if($produit->modelesFille->count() > 0)
        <div id="modeles-fille" class="modeles-section" style="display:none;">
            <div class="row g-4">
                @foreach($produit->modelesFille as $modele)
                    <div class="col-md-4 col-sm-6">
                        <div class="rounded-4 overflow-hidden shadow-sm"
                             style="transition: all 0.4s;"
                             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)'"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.08)'">
                            <div style="height: 420px; overflow: hidden; position: relative;">
                                <img src="{{ asset('storage/' . $modele->image) }}"
                                     style="width: 100%; height: 100%; object-fit: cover;
                                            transition: transform 0.6s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'">
                                <div style="position: absolute; bottom: 0; left: 0; right: 0;
                                            background: linear-gradient(transparent, rgba(26,26,46,0.9));
                                            padding: 30px 20px 20px;">
                                    <span class="badge rounded-pill px-3 py-2 mb-2"
                                          style="background: rgba(233,69,96,0.9);">
                                        👧 Fille
                                    </span>
                                    <h5 class="fw-bold text-white mb-1">{{ $modele->nom }}</h5>
                                    @if($modele->description)
                                        <p class="text-white-50 small mb-0">{{ $modele->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
    @endif

    <!-- Vous aimerez aussi -->
    <div class="mt-5">
        <h3 class="fw-bold mb-4" style="font-family: 'Playfair Display', serif;">
            Vous aimerez aussi 👇
        </h3>
        <div class="row">
            @foreach(\App\Models\Produit::where('id', '!=', $produit->id)->take(3)->get() as $autre)
                <div class="col-md-4 mb-4">
                    <div class="product-card card h-100">
                        <div class="img-wrapper">
                            @if($autre->image)
                                <img src="{{ asset('storage/' . $autre->image) }}" alt="{{ $autre->nom }}">
                            @else
                                <div class="no-image-placeholder">🎨</div>
                            @endif
                            <div class="overlay">
                                <a href="/produits/{{ $autre->id }}" class="overlay-btn">
                                    <i class="fas fa-eye"></i> Voir le produit
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1">{{ $autre->nom }}</h5>
                            <p class="text-muted small mb-3">{{ Str::limit($autre->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price-tag">{{ number_format($autre->prix, 0, ',', ' ') }} FCFA</span>
                                <a href="/produits/{{ $autre->id }}" class="btn-view"
                                   style="width: auto; padding: 8px 20px;">
                                    Voir <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Gestion longueurs
        document.querySelectorAll('.longueur-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.longueur-card').forEach(card => {
                    card.style.borderColor = '#eee';
                    card.style.background = 'white';
                });
                this.nextElementSibling.style.borderColor = '#e94560';
                this.nextElementSibling.style.background = '#fff0f3';
            });
        });

        // Activer la première longueur par défaut
        const firstRadio = document.querySelector('.longueur-radio');
        if (firstRadio) {
            firstRadio.nextElementSibling.style.borderColor = '#e94560';
            firstRadio.nextElementSibling.style.background = '#fff0f3';
        }

        // Quantité
        function incrementQty() {
            const input = document.getElementById('quantite');
            if (parseInt(input.value) < 20) input.value = parseInt(input.value) + 1;
        }

        function decrementQty() {
            const input = document.getElementById('quantite');
            if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
        }

        // Modèles
        function showModeles(genre) {
            document.querySelectorAll('.modeles-section').forEach(section => {
                section.style.display = 'none';
            });

            const section = document.getElementById('modeles-' + genre);
            if (section) section.style.display = 'block';

            document.querySelectorAll('.genre-btn').forEach(btn => {
                btn.style.background = 'transparent';
                btn.style.color = '#1a1a2e';
                btn.style.border = '2px solid #1a1a2e';
            });

            const activeBtn = document.getElementById('btn-' + genre);
            if (activeBtn) {
                activeBtn.style.background = '#1a1a2e';
                activeBtn.style.color = 'white';
                activeBtn.style.border = 'none';
            }
        }
    </script>

@endsection