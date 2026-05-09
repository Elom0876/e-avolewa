@extends('layouts.app')

@section('title', 'Générer mon style - ' . $produit->nom)

@section('content')

    <!-- Header -->
    <div class="text-center py-4 mb-5">
        <h1 class="fw-bold section-title" style="font-family: 'Playfair Display', serif;">
            ✨ Générer mon style
        </h1>
        <div class="section-divider mx-auto"><span>🤖</span></div>
        <p class="text-muted mt-3">
            Notre IA va créer une image personnalisée de vous portant le pagne
            <strong style="color: #E8A020;">{{ $produit->nom }}</strong>
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row g-4">

                <!-- Formulaire -->
                <div class="col-md-5">
                    <div class="bg-white rounded-4 shadow-sm p-4">
                        <h5 class="fw-bold mb-4" style="color: #1C0A00;">
                            <i class="fas fa-sliders-h me-2" style="color: #E8A020;"></i>
                            Personnalisez votre style
                        </h5>

                        <!-- Couleur de peau -->
                        <div class="mb-4">
                            <label class="fw-bold mb-3 d-block" style="color: #1C0A00; font-size: 0.9rem;">
                                <i class="fas fa-palette me-2" style="color: #E8A020;"></i>
                                Couleur de peau
                            </label>
                            <div class="row g-2">
                                @php
                                    $peaux = [
                                        ['value' => 'very light', 'label' => 'Très claire', 'color' => '#F5D5B0'],
                                        ['value' => 'light brown', 'label' => 'Claire', 'color' => '#C68642'],
                                        ['value' => 'medium brown', 'label' => 'Métisse', 'color' => '#8D5524'],
                                        ['value' => 'dark brown', 'label' => 'Foncée', 'color' => '#4A2912'],
                                        ['value' => 'very dark ebony', 'label' => 'Ébène', 'color' => '#1C0A00'],
                                    ];
                                @endphp
                                @foreach($peaux as $peau)
                                    <div class="col-4">
                                        <input type="radio" name="couleur_peau"
                                               value="{{ $peau['value'] }}"
                                               id="peau_{{ $loop->index }}"
                                               class="d-none peau-radio"
                                               {{ $loop->first ? 'checked' : '' }}>
                                        <label for="peau_{{ $loop->index }}"
                                               class="peau-card w-100 text-center p-2 rounded-3"
                                               style="border: 2px solid #eee; cursor: pointer;
                                                      transition: all 0.3s; display: block;">
                                            <div class="rounded-circle mx-auto mb-1"
                                                 style="width: 35px; height: 35px;
                                                        background: {{ $peau['color'] }};
                                                        border: 2px solid rgba(0,0,0,0.1);">
                                            </div>
                                            <span style="font-size: 0.7rem; font-weight: 600; color: #1C0A00;">
                                                {{ $peau['label'] }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Genre -->
                        <div class="mb-4">
                            <label class="fw-bold mb-3 d-block" style="color: #1C0A00; font-size: 0.9rem;">
                                <i class="fas fa-venus-mars me-2" style="color: #E8A020;"></i>
                                Genre
                            </label>
                            <div class="row g-2">
                                @php
                                    $genres = [
                                        ['value' => 'woman', 'label' => 'Femme', 'icon' => '👗'],
                                        ['value' => 'man', 'label' => 'Homme', 'icon' => '👔'],
                                        ['value' => 'girl', 'label' => 'Fille', 'icon' => '👧'],
                                        ['value' => 'boy', 'label' => 'Garçon', 'icon' => '👦'],
                                    ];
                                @endphp
                                @foreach($genres as $genre)
                                    <div class="col-3">
                                        <input type="radio" name="genre"
                                               value="{{ $genre['value'] }}"
                                               id="genre_{{ $loop->index }}"
                                               class="d-none genre-radio"
                                               {{ $loop->first ? 'checked' : '' }}>
                                        <label for="genre_{{ $loop->index }}"
                                               class="genre-card w-100 text-center p-2 rounded-3"
                                               style="border: 2px solid #eee; cursor: pointer;
                                                      transition: all 0.3s; display: block;">
                                            <div style="font-size: 1.5rem;">{{ $genre['icon'] }}</div>
                                            <span style="font-size: 0.7rem; font-weight: 600; color: #1C0A00;">
                                                {{ $genre['label'] }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Style de tenue -->
                        <div class="mb-4">
                            <label class="fw-bold mb-3 d-block" style="color: #1C0A00; font-size: 0.9rem;">
                                <i class="fas fa-tshirt me-2" style="color: #E8A020;"></i>
                                Style de tenue
                            </label>
                            <div class="row g-2">
                                @php
                                    $styles = [
                                        ['value' => 'long dress', 'label' => 'Robe longue', 'icon' => '👘'],
                                        ['value' => 'short dress', 'label' => 'Robe courte', 'icon' => '💃'],
                                        ['value' => 'boubou', 'label' => 'Boubou', 'icon' => '🧕'],
                                        ['value' => 'evening gown', 'label' => 'Soirée', 'icon' => '✨'],
                                        ['value' => 'casual outfit', 'label' => 'Casual', 'icon' => '😊'],
                                        ['value' => 'wedding outfit', 'label' => 'Mariage', 'icon' => '💍'],
                                        ['value' => 'shirt and trousers', 'label' => 'Chemise', 'icon' => '👕'],
                                        ['value' => 'traditional outfit', 'label' => 'Traditionnel', 'icon' => '🌍'],
                                    ];
                                @endphp
                                @foreach($styles as $style)
                                    <div class="col-3">
                                        <input type="radio" name="style"
                                               value="{{ $style['value'] }}"
                                               id="style_{{ $loop->index }}"
                                               class="d-none style-radio"
                                               {{ $loop->first ? 'checked' : '' }}>
                                        <label for="style_{{ $loop->index }}"
                                               class="style-card w-100 text-center p-2 rounded-3"
                                               style="border: 2px solid #eee; cursor: pointer;
                                                      transition: all 0.3s; display: block;">
                                            <div style="font-size: 1.5rem;">{{ $style['icon'] }}</div>
                                            <span style="font-size: 0.65rem; font-weight: 600; color: #1C0A00;">
                                                {{ $style['label'] }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Bouton générer -->
                        <button onclick="genererStyle()" id="btnGenerer"
                                class="btn w-100 rounded-pill py-3 fw-bold"
                                style="background: linear-gradient(135deg, #1C0A00, #6B2D0A);
                                       color: white; border: none; font-size: 1rem;
                                       transition: all 0.3s;">
                            <i class="fas fa-magic me-2"></i>Générer mon style
                        </button>

                        <a href="/produits/{{ $produit->id }}"
                           class="btn w-100 rounded-pill py-2 mt-2 fw-bold"
                           style="border: 2px solid #1C0A00; color: #1C0A00;">
                            <i class="fas fa-arrow-left me-2"></i>Retour au pagne
                        </a>
                    </div>
                </div>

                <!-- Résultat -->
                <div class="col-md-7">
                    <div class="bg-white rounded-4 shadow-sm p-4 h-100 d-flex flex-column align-items-center justify-content-center"
                         style="min-height: 500px;">

                        <!-- État initial -->
                        <div id="etatInitial" class="text-center">
                            <div style="font-size: 5rem; margin-bottom: 20px;">🤖</div>
                            <h4 class="fw-bold mb-2" style="color: #1C0A00;">
                                Votre style personnalisé apparaîtra ici
                            </h4>
                            <!-- Description libre -->
<div class="mb-4">
    <label class="fw-bold mb-2 d-block" style="color: #1C0A00; font-size: 0.9rem;">
        <i class="fas fa-pen me-2" style="color: #E8A020;"></i>
        Décrivez votre style (optionnel)
    </label>
    <textarea id="descriptionLibre" rows="3"
              class="form-control rounded-3"
              placeholder="Ex: Je veux une robe avec des broderies dorées, une ceinture, des manches longues, pour un mariage..."
              style="border: 2px solid #eee; transition: all 0.3s; resize: none; font-size: 0.85rem;"
              onfocus="this.style.borderColor='#E8A020'; this.style.boxShadow='0 0 0 3px rgba(232,160,32,0.1)'"
              onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
    </textarea>
    <p class="small text-muted mt-1">
        <i class="fas fa-lightbulb me-1" style="color: #E8A020;"></i>
        Plus vous décrivez précisément, meilleur sera le résultat !
    </p>
</div>
                            <p class="text-muted">
                                Choisissez vos préférences et cliquez sur
                                <strong>"Générer mon style"</strong>
                            </p>
                            <div class="mt-4 p-3 rounded-3" style="background: #FFF3DC;">
                                <p class="small mb-0" style="color: #6B2D0A;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    La génération prend environ <strong>20-30 secondes</strong>.
                                    Notre IA crée une image unique rien que pour vous !
                                </p>
                            </div>
                        </div>

                        <!-- Chargement -->
                        <div id="etatChargement" class="text-center d-none">
                            <div style="font-size: 4rem; margin-bottom: 20px;
                                        animation: spin 2s linear infinite;">
                                ✨
                            </div>
                            <h4 class="fw-bold mb-2" style="color: #1C0A00;">
                                L'IA crée votre style...
                            </h4>
                            <p class="text-muted mb-3">Patientez 20-30 secondes</p>
                            <div class="progress rounded-pill" style="height: 8px; width: 200px; margin: 0 auto;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     style="width: 100%; background: linear-gradient(135deg, #E8A020, #6B2D0A);">
                                </div>
                            </div>
                        </div>

                        <!-- Résultat -->
                        <div id="etatResultat" class="text-center d-none w-100">
                            <img id="imageGeneree" src="" alt="Style généré"
                                 class="rounded-4 shadow mb-3"
                                 style="max-width: 100%; max-height: 450px; object-fit: contain;">
                            <div class="d-flex gap-2 justify-content-center mt-3">
                                <button onclick="telechargerImage()"
                                        class="btn rounded-pill px-4 py-2 fw-bold"
                                        style="background: linear-gradient(135deg, #E8A020, #F5A623);
                                               color: white; border: none;">
                                    <i class="fas fa-download me-2"></i>Télécharger
                                </button>
                                <button onclick="genererStyle()"
                                        class="btn rounded-pill px-4 py-2 fw-bold"
                                        style="border: 2px solid #1C0A00; color: #1C0A00;">
                                    <i class="fas fa-redo me-2"></i>Régénérer
                                </button>
                                <a href="/panier/ajouter/{{ $produit->id }}"
                                   class="btn rounded-pill px-4 py-2 fw-bold"
                                   style="background: linear-gradient(135deg, #1C0A00, #6B2D0A);
                                          color: white; border: none;">
                                    <i class="fas fa-shopping-bag me-2"></i>Commander
                                </a>
                            </div>
                        </div>

                        <!-- Erreur -->
                        <div id="etatErreur" class="text-center d-none">
                            <div style="font-size: 3rem; margin-bottom: 15px;">😔</div>
                            <h5 class="fw-bold mb-2" style="color: #1C0A00;">
                                Génération échouée
                            </h5>
                            <p class="text-muted mb-3" id="messageErreur">
                                Une erreur s'est produite. Réessayez.
                            </p>
                            <button onclick="genererStyle()"
                                    class="btn rounded-pill px-4 py-2 fw-bold"
                                    style="background: linear-gradient(135deg, #E8A020, #F5A623);
                                           color: white; border: none;">
                                <i class="fas fa-redo me-2"></i>Réessayer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .peau-radio:checked + .peau-card,
        .genre-radio:checked + .genre-card,
        .style-radio:checked + .style-card {
            border-color: #E8A020 !important;
            background: #FFF3DC;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <script>
        // Sélection des options
        document.querySelectorAll('.peau-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.peau-card').forEach(card => {
                    card.style.borderColor = '#eee';
                    card.style.background = 'transparent';
                });
                this.nextElementSibling.style.borderColor = '#E8A020';
                this.nextElementSibling.style.background = '#FFF3DC';
            });
        });

        document.querySelectorAll('.genre-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.genre-card').forEach(card => {
                    card.style.borderColor = '#eee';
                    card.style.background = 'transparent';
                });
                this.nextElementSibling.style.borderColor = '#E8A020';
                this.nextElementSibling.style.background = '#FFF3DC';
            });
        });

        document.querySelectorAll('.style-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.style-card').forEach(card => {
                    card.style.borderColor = '#eee';
                    card.style.background = 'transparent';
                });
                this.nextElementSibling.style.borderColor = '#E8A020';
                this.nextElementSibling.style.background = '#FFF3DC';
            });
        });

        // Activer les premiers par défaut
        document.querySelector('.peau-card').style.borderColor = '#E8A020';
        document.querySelector('.peau-card').style.background = '#FFF3DC';
        document.querySelector('.genre-card').style.borderColor = '#E8A020';
        document.querySelector('.genre-card').style.background = '#FFF3DC';
        document.querySelector('.style-card').style.borderColor = '#E8A020';
        document.querySelector('.style-card').style.background = '#FFF3DC';

        function afficherEtat(etat) {
            ['Initial', 'Chargement', 'Resultat', 'Erreur'].forEach(e => {
                document.getElementById('etat' + e).classList.add('d-none');
            });
            document.getElementById('etat' + etat).classList.remove('d-none');
        }

        async function genererStyle() {
            const couleurPeau = document.querySelector('input[name="couleur_peau"]:checked')?.value;
            const genre = document.querySelector('input[name="genre"]:checked')?.value;
            const style = document.querySelector('input[name="style"]:checked')?.value;

            if (!couleurPeau || !genre || !style) {
                alert('Veuillez sélectionner toutes les options !');
                return;
            }

            afficherEtat('Chargement');

            try {
                const response = await fetch('/produits/{{ $produit->id }}/style', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ couleur_peau: couleurPeau, genre, style })
                });

                const data = await response.json();

                if (data.success) {
                    document.getElementById('imageGeneree').src = data.image;
                    afficherEtat('Resultat');
                } else {
                    document.getElementById('messageErreur').textContent = data.message;
                    afficherEtat('Erreur');
                }
            } catch (error) {
                document.getElementById('messageErreur').textContent = 'Erreur de connexion. Réessayez.';
                afficherEtat('Erreur');
            }
        }

        function telechargerImage() {
            const img = document.getElementById('imageGeneree');
            const a = document.createElement('a');
            a.href = img.src;
            a.download = 'mon-style-{{ $produit->nom }}.jpg';
            a.click();
        }
    </script>

@endsection