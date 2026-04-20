@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

    <!-- ========= HERO SECTION ========= -->
    <div class="hero-section position-relative overflow-hidden rounded-4 mb-5"
         style="min-height: 600px; background: linear-gradient(135deg, #1C0A00 0%, #6B2D0A 50%, #1C0A00 100%);">

        <!-- Motif africain animé -->
        <div class="position-absolute w-100 h-100" style="top:0; left:0; overflow:hidden;">
            <div style="position: absolute; inset: 0;
                        background-image:
                            repeating-linear-gradient(45deg, rgba(232,160,32,0.06) 0px, rgba(232,160,32,0.06) 2px, transparent 2px, transparent 40px),
                            repeating-linear-gradient(-45deg, rgba(196,30,58,0.04) 0px, rgba(196,30,58,0.04) 2px, transparent 2px, transparent 40px);">
            </div>
        </div>

        <!-- Cercles lumineux -->
        <div class="position-absolute"
             style="width: 500px; height: 500px; border-radius: 50%;
                    background: radial-gradient(circle, rgba(232,160,32,0.15) 0%, transparent 70%);
                    top: -150px; right: -100px; pointer-events: none;
                    animation: glowPulse 4s ease-in-out infinite;">
        </div>
        <div class="position-absolute"
             style="width: 400px; height: 400px; border-radius: 50%;
                    background: radial-gradient(circle, rgba(196,30,58,0.12) 0%, transparent 70%);
                    bottom: -100px; left: -80px; pointer-events: none;
                    animation: glowPulse 6s ease-in-out infinite reverse;">
        </div>

        <!-- Contenu hero -->
        <div class="container position-relative py-5" style="z-index: 2;">
            <div class="row align-items-center" style="min-height: 560px;">

                <!-- Texte gauche -->
                <div class="col-lg-6 text-white py-5">

                    <!-- Badge animé -->
                    <div class="d-inline-flex align-items-center gap-2 mb-4 px-4 py-2 rounded-pill"
                         style="background: rgba(232,160,32,0.15);
                                border: 1px solid rgba(232,160,32,0.4);
                                animation: fadeInDown 0.8s ease;">
                        <span style="color: #FFD700;">✦</span>
                        <span style="color: rgba(255,255,255,0.95); font-size: 0.82rem;
                                     letter-spacing: 3px; text-transform: uppercase; font-weight: 600;">
                            Pagnes & Tissus Africains Authentiques
                        </span>
                        <span style="color: #FFD700;">✦</span>
                    </div>

                    <!-- Titre principal -->
                    <h1 class="fw-black mb-4"
                        style="font-family: 'Playfair Display', serif;
                               font-size: clamp(2.8rem, 5.5vw, 4.5rem);
                               line-height: 1.05;
                               animation: fadeInLeft 1s ease;">
                        L'art du tissu
                        <span style="display: block; color: #E8A020;
                                     text-shadow: 0 0 40px rgba(232,160,32,0.6);
                                     font-style: italic;">
                            africain
                        </span>
                        <span style="display: block; font-size: 0.65em; color: rgba(255,255,255,0.9);
                                     font-style: normal; margin-top: 5px;">
                            à votre portée
                        </span>
                    </h1>

                    <p class="mb-5"
                       style="color: rgba(255,255,255,0.78); font-size: 1.05rem;
                              line-height: 1.9; max-width: 480px;
                              animation: fadeInLeft 1.2s ease;">
                        Découvrez notre collection de pagnes authentiques soigneusement
                        sélectionnés —
                        <strong style="color: #FFD700;">Vlisco, Wax Hollandais, Super, Bazin, Kente</strong>
                        et bien plus. Des tissus qui portent l'âme de l'Afrique.
                    </p>

                    <!-- Boutons -->
                    <div class="d-flex gap-3 flex-wrap mb-5"
                         style="animation: fadeInUp 1.4s ease;">
                        <a href="/produits"
                           class="btn btn-lg px-5 py-3 rounded-pill fw-bold"
                           style="background: linear-gradient(135deg, #E8A020, #F5A623);
                                  color: white; border: none; font-size: 1rem;
                                  box-shadow: 0 10px 35px rgba(232,160,32,0.5);
                                  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);"
                           onmouseover="this.style.transform='translateY(-6px) scale(1.05)'; this.style.boxShadow='0 20px 50px rgba(232,160,32,0.6)'"
                           onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 10px 35px rgba(232,160,32,0.5)'">
                            <i class="fas fa-store me-2"></i>Explorer nos pagnes
                        </a>
                        <a href="/categories"
                           class="btn btn-lg px-5 py-3 rounded-pill fw-bold"
                           style="background: rgba(255,255,255,0.08); color: white;
                                  border: 2px solid rgba(255,255,255,0.4);
                                  backdrop-filter: blur(10px); font-size: 1rem;
                                  transition: all 0.3s;"
                           onmouseover="this.style.background='rgba(255,255,255,0.18)'; this.style.borderColor='white'; this.style.transform='translateY(-6px)'"
                           onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.borderColor='rgba(255,255,255,0.4)'; this.style.transform='translateY(0)'">
                            <i class="fas fa-th-large me-2"></i>Catégories
                        </a>
                    </div>

                    <!-- Compteurs -->
                    <div class="d-flex gap-4 flex-wrap"
                         style="animation: fadeInUp 1.6s ease;">
                        <div style="border-left: 3px solid #E8A020; padding-left: 15px;">
                            <div class="fw-black" style="font-size: 2rem; color: #FFD700; line-height: 1;">10+</div>
                            <div style="color: rgba(255,255,255,0.6); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 1px;">Types de pagnes</div>
                        </div>
                        <div style="border-left: 3px solid #E8A020; padding-left: 15px;">
                            <div class="fw-black" style="font-size: 2rem; color: #FFD700; line-height: 1;">500+</div>
                            <div style="color: rgba(255,255,255,0.6); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 1px;">Clients satisfaits</div>
                        </div>
                        <div style="border-left: 3px solid #E8A020; padding-left: 15px;">
                            <div class="fw-black" style="font-size: 2rem; color: #FFD700; line-height: 1;">4</div>
                            <div style="color: rgba(255,255,255,0.6); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 1px;">Longueurs dispo</div>
                        </div>
                    </div>
                </div>

                <!-- Côté droit - Éléments 3D -->
                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                    <div class="position-relative" style="width: 450px; height: 480px;">

                        <!-- Carte principale -->
                        <div class="position-absolute"
                             style="width: 280px; height: 350px;
                                    background: linear-gradient(145deg, #E8A020, #F5A623, #D4840A);
                                    border-radius: 24px;
                                    top: 50%; left: 50%;
                                    transform: translate(-50%, -50%) perspective(1200px) rotateY(-18deg) rotateX(8deg);
                                    box-shadow: 25px 25px 70px rgba(0,0,0,0.6),
                                                -8px -8px 25px rgba(232,160,32,0.2),
                                                inset 0 1px 0 rgba(255,255,255,0.2);
                                    animation: float3dMain 5s ease-in-out infinite;
                                    overflow: hidden;">
                            <!-- Reflet -->
                            <div style="position: absolute; top: 0; left: 0; right: 0; height: 50%;
                                        background: linear-gradient(180deg, rgba(255,255,255,0.15), transparent);
                                        border-radius: 24px 24px 0 0;">
                            </div>
                            <!-- Motif -->
                            <div style="position: absolute; inset: 0;
                                        background: repeating-linear-gradient(
                                            45deg, rgba(255,255,255,0.04) 0px,
                                            rgba(255,255,255,0.04) 2px,
                                            transparent 2px, transparent 25px);">
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white p-4 position-relative">
                                <div style="font-size: 4.5rem; margin-bottom: 20px;
                                            filter: drop-shadow(0 8px 20px rgba(0,0,0,0.4));">
                                    🎨
                                </div>
                                <div style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; text-align: center;">
                                    Pagnes Authentiques
                                </div>
                                <div style="font-size: 0.8rem; opacity: 0.85; margin-top: 8px; text-align: center;">
                                    Vlisco • Wax • Super • Bazin
                                </div>
                                <div style="margin-top: 20px; padding: 8px 20px; border-radius: 50px;
                                            background: rgba(255,255,255,0.2);
                                            border: 1px solid rgba(255,255,255,0.3);
                                            font-size: 0.8rem; font-weight: 600;">
                                    ✦ Qualité Garantie ✦
                                </div>
                            </div>
                        </div>

                        <!-- Carte rouge -->
                        <div class="position-absolute"
                             style="width: 210px; height: 265px;
                                    background: linear-gradient(145deg, #C41E3A, #8B0000, #C41E3A);
                                    border-radius: 20px;
                                    bottom: 30px; right: 20px;
                                    transform: perspective(1200px) rotateY(22deg) rotateX(-8deg);
                                    box-shadow: 20px 20px 55px rgba(0,0,0,0.5),
                                                inset 0 1px 0 rgba(255,255,255,0.15);
                                    animation: float3dSecond 6s ease-in-out infinite;
                                    overflow: hidden;">
                            <div style="position: absolute; top: 0; left: 0; right: 0; height: 50%;
                                        background: linear-gradient(180deg, rgba(255,255,255,0.12), transparent);
                                        border-radius: 20px 20px 0 0;">
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white p-3 position-relative">
                                <div style="font-size: 3rem; margin-bottom: 12px;
                                            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.4));">
                                    👗
                                </div>
                                <div style="font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 700; text-align: center;">
                                    Modèles & Styles
                                </div>
                                <div style="font-size: 0.75rem; opacity: 0.8; margin-top: 6px;">
                                    Homme • Femme
                                </div>
                                <div style="font-size: 0.7rem; opacity: 0.7; margin-top: 4px;">
                                    Garçon • Fille
                                </div>
                            </div>
                        </div>

                        <!-- Carte verte -->
                        <div class="position-absolute"
                             style="width: 170px; height: 215px;
                                    background: linear-gradient(145deg, #2D6A4F, #1B4332, #2D6A4F);
                                    border-radius: 18px;
                                    top: 20px; left: 15px;
                                    transform: perspective(1200px) rotateY(28deg) rotateX(12deg);
                                    box-shadow: 15px 15px 45px rgba(0,0,0,0.5),
                                                inset 0 1px 0 rgba(255,255,255,0.12);
                                    animation: float3dThird 7s ease-in-out infinite;
                                    overflow: hidden;">
                            <div style="position: absolute; top: 0; left: 0; right: 0; height: 50%;
                                        background: linear-gradient(180deg, rgba(255,255,255,0.1), transparent);
                                        border-radius: 18px 18px 0 0;">
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white p-3 position-relative">
                                <div style="font-size: 2.5rem; margin-bottom: 10px;
                                            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.4));">
                                    🌍
                                </div>
                                <div style="font-family: 'Playfair Display', serif; font-size: 0.9rem; font-weight: 700; text-align: center;">
                                    Made in Africa
                                </div>
                                <div style="font-size: 0.7rem; opacity: 0.75; margin-top: 5px; text-align: center;">
                                    Authenticité & Tradition
                                </div>
                            </div>
                        </div>

                        <!-- Boules flottantes -->
                        <div style="position: absolute; width: 55px; height: 55px;
                                    background: radial-gradient(circle at 30% 30%, #FFD700, #E8A020);
                                    border-radius: 50%; top: 5px; right: 55px;
                                    box-shadow: 0 10px 30px rgba(255,215,0,0.5),
                                                inset 0 -3px 8px rgba(0,0,0,0.2);
                                    animation: floatBall 3.5s ease-in-out infinite;">
                        </div>
                        <div style="position: absolute; width: 35px; height: 35px;
                                    background: radial-gradient(circle at 30% 30%, #ff6b6b, #C41E3A);
                                    border-radius: 50%; bottom: 70px; left: 25px;
                                    box-shadow: 0 8px 20px rgba(196,30,58,0.5),
                                                inset 0 -2px 6px rgba(0,0,0,0.2);
                                    animation: floatBall 4.5s ease-in-out infinite reverse;">
                        </div>
                        <div style="position: absolute; width: 25px; height: 25px;
                                    background: radial-gradient(circle at 30% 30%, #69db7c, #2D6A4F);
                                    border-radius: 50%; top: 60%; right: 15px;
                                    box-shadow: 0 6px 15px rgba(45,106,79,0.5);
                                    animation: floatBall 5s ease-in-out infinite;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vague décorative en bas -->
        <div style="position: absolute; bottom: -1px; left: 0; right: 0;">
            <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,30 C360,60 720,0 1080,30 C1260,45 1380,25 1440,30 L1440,60 L0,60 Z"
                      fill="#FFF9F0"/>
            </svg>
        </div>
    </div>

    <!-- ========= TYPES DE PAGNES ========= -->
    <div class="mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold section-title">Nos Types de Pagnes</h2>
            <div class="section-divider mx-auto"><span>🎨</span></div>
            <p class="text-muted mt-3">Des tissus authentiques venus des quatre coins de l'Afrique et du monde</p>
        </div>

        <div class="row g-3">
            @foreach(\App\Models\TypePagne::all() as $type)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center p-3 rounded-4 bg-white h-100 position-relative overflow-hidden"
                         style="transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                border: 2px solid transparent;
                                box-shadow: 0 4px 15px rgba(28,10,0,0.06); cursor: pointer;"
                         onmouseover="this.style.transform='translateY(-10px) scale(1.05)';
                                      this.style.borderColor='#E8A020';
                                      this.style.boxShadow='0 20px 40px rgba(232,160,32,0.2)'"
                         onmouseout="this.style.transform='translateY(0) scale(1)';
                                     this.style.borderColor='transparent';
                                     this.style.boxShadow='0 4px 15px rgba(28,10,0,0.06)'">
                        <!-- Fond décoratif -->
                        <div style="position: absolute; bottom: -15px; right: -15px;
                                    font-size: 4rem; opacity: 0.05; pointer-events: none;">
                            🎨
                        </div>
                        <div style="font-size: 2.2rem; margin-bottom: 8px;">🎨</div>
                        <div class="fw-bold" style="color: #1C0A00; font-size: 0.85rem;">{{ $type->nom }}</div>
                        @if($type->origine)
                            <div class="mt-1 px-2 py-1 rounded-pill d-inline-block"
                                 style="background: #FFF3DC; color: #6B2D0A; font-size: 0.65rem; font-weight: 600;">
                                {{ $type->origine }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ========= PRODUITS EN VEDETTE ========= -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-1 section-title">Pagnes en vedette</h2>
                <p class="text-muted mb-0">Nos meilleures sélections du moment</p>
            </div>
            <a href="/produits"
               class="btn rounded-pill px-4 py-2 fw-bold"
               style="border: 2px solid #1C0A00; color: #1C0A00; transition: all 0.3s;"
               onmouseover="this.style.background='#1C0A00'; this.style.color='white'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='transparent'; this.style.color='#1C0A00'; this.style.transform='translateY(0)'">
                Voir tout <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row">
            @forelse($produits as $produit)
                <div class="col-md-4 mb-4">
                    <div class="product-card card h-100">
                        <div class="img-wrapper">
                            @if($produit->image)
                                <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}">
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
                                <h5 class="fw-bold mb-0" style="color: #1C0A00;">{{ $produit->nom }}</h5>
                                @if($produit->categorie)
                                    <span class="badge rounded-pill ms-2"
                                          style="background: #FFF3DC; color: #6B2D0A;
                                                 font-size: 0.7rem; white-space: nowrap;">
                                        {{ $produit->categorie->nom }}
                                    </span>
                                @endif
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
            @empty
                <div class="col-12 text-center py-5">
                    <div style="font-size: 4rem;">🎨</div>
                    <h4 class="mt-3 mb-2" style="color: #1C0A00;">Aucun pagne disponible</h4>
                    <p class="text-muted">Revenez bientôt, nous ajoutons de nouveaux pagnes régulièrement !</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- ========= BANNER PROMO ========= -->
    <div class="rounded-4 p-5 mb-5 position-relative overflow-hidden"
         style="background: linear-gradient(135deg, #1C0A00 0%, #6B2D0A 60%, #1C0A00 100%);">
        <div style="position: absolute; font-size: 20rem; opacity: 0.03;
                    top: -80px; right: -50px; line-height: 1; pointer-events: none;">
            🎨
        </div>
        <div style="position: absolute; inset: 0;
                    background: repeating-linear-gradient(
                        45deg, rgba(232,160,32,0.04) 0px,
                        rgba(232,160,32,0.04) 2px,
                        transparent 2px, transparent 35px);">
        </div>
        <div class="row align-items-center position-relative" style="z-index: 1;">
            <div class="col-md-8 text-white mb-4 mb-md-0">
                <div class="d-inline-flex align-items-center gap-2 mb-3 px-3 py-1 rounded-pill"
                     style="background: rgba(232,160,32,0.2); border: 1px solid rgba(232,160,32,0.4);">
                    <i class="fas fa-truck" style="color: #FFD700;"></i>
                    <span style="color: rgba(255,255,255,0.9); font-size: 0.8rem; font-weight: 600;">
                        Offre spéciale livraison
                    </span>
                </div>
                <h3 class="fw-bold mb-2"
                    style="font-family: 'Playfair Display', serif; font-size: 2rem;">
                    🚚 Livraison gratuite à Cotonou
                </h3>
                <p style="color: rgba(255,255,255,0.78); font-size: 1rem; margin-bottom: 0; line-height: 1.8;">
                    Pour toute commande supérieure à
                    <strong style="color: #FFD700; font-size: 1.1em;">25 000 FCFA</strong>.
                    Vos pagnes de qualité livrés directement chez vous !
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="/produits"
                   class="btn btn-lg rounded-pill px-5 py-3 fw-bold"
                   style="background: linear-gradient(135deg, #E8A020, #F5A623);
                          color: white; border: none; font-size: 1rem;
                          box-shadow: 0 10px 30px rgba(232,160,32,0.4);
                          transition: all 0.4s;"
                   onmouseover="this.style.transform='translateY(-6px) scale(1.05)'; this.style.boxShadow='0 20px 45px rgba(232,160,32,0.5)'"
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 10px 30px rgba(232,160,32,0.4)'">
                    <i class="fas fa-shopping-bag me-2"></i>Commander maintenant
                </a>
            </div>
        </div>
    </div>

    <!-- ========= POURQUOI NOUS ========= -->
    <div class="mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold section-title">Pourquoi choisir E-Avɔ Lẹwa ?</h2>
            <div class="section-divider mx-auto"><span>⭐</span></div>
        </div>

        <div class="row g-4">
            @php
                $avantages = [
                    ['icon' => 'fas fa-award', 'titre' => 'Qualité Premium', 'desc' => 'Pagnes authentiques soigneusement sélectionnés pour vous', 'color' => '#E8A020'],
                    ['icon' => 'fas fa-truck', 'titre' => 'Livraison Rapide', 'desc' => 'Livraison en 24h à Cotonou et ses environs', 'color' => '#C41E3A'],
                    ['icon' => 'fas fa-ruler', 'titre' => 'Vos Longueurs', 'desc' => 'Disponible en 2m, 4m, 6m ou 12m selon vos besoins', 'color' => '#2D6A4F'],
                    ['icon' => 'fas fa-shield-alt', 'titre' => 'Paiement Sécurisé', 'desc' => 'Transactions 100% sécurisées et protégées', 'color' => '#6B2D0A'],
                ];
            @endphp

            @foreach($avantages as $avantage)
                <div class="col-md-3 col-6">
                    <div class="stat-card text-center p-4 rounded-4 bg-white h-100"
                         style="box-shadow: 0 5px 20px rgba(28,10,0,0.07);">
                        <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-4"
                             style="width: 75px; height: 75px;
                                    background: linear-gradient(135deg, #FFF3DC, #F5DEB3);
                                    box-shadow: 0 8px 20px rgba(232,160,32,0.2);">
                            <i class="{{ $avantage['icon'] }} fa-lg" style="color: {{ $avantage['color'] }};"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #1C0A00;">{{ $avantage['titre'] }}</h5>
                        <p class="text-muted small mb-0" style="line-height: 1.7;">{{ $avantage['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Animations CSS -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        @keyframes glowPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.05); }
        }
        @keyframes float3dMain {
            0%, 100% {
                transform: translate(-50%, -50%) perspective(1200px) rotateY(-18deg) rotateX(8deg) translateY(0px);
                box-shadow: 25px 25px 70px rgba(0,0,0,0.6), -8px -8px 25px rgba(232,160,32,0.2);
            }
            50% {
                transform: translate(-50%, -50%) perspective(1200px) rotateY(-12deg) rotateX(10deg) translateY(-20px);
                box-shadow: 30px 35px 80px rgba(0,0,0,0.5), -8px -8px 30px rgba(232,160,32,0.3);
            }
        }
        @keyframes float3dSecond {
            0%, 100% {
                transform: perspective(1200px) rotateY(22deg) rotateX(-8deg) translateY(0px);
            }
            50% {
                transform: perspective(1200px) rotateY(18deg) rotateX(-5deg) translateY(-15px);
            }
        }
        @keyframes float3dThird {
            0%, 100% {
                transform: perspective(1200px) rotateY(28deg) rotateX(12deg) translateY(0px);
            }
            50% {
                transform: perspective(1200px) rotateY(22deg) rotateX(15deg) translateY(-12px);
            }
        }
        @keyframes floatBall {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-25px) scale(1.08); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

@endsection