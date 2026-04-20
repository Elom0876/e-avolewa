@extends('layouts.app')

@section('title', 'Ajouter un modèle')

@section('content')

    <div class="row justify-content-center py-4">
        <div class="col-md-7">

            <!-- Header -->
            <div class="mb-4">
                <a href="/admin/produits/{{ $produit->id }}/modeles"
                   class="text-muted text-decoration-none small"
                   style="transition: all 0.3s;"
                   onmouseover="this.style.color='#e94560'"
                   onmouseout="this.style.color='#6c757d'">
                    <i class="fas fa-arrow-left me-2"></i>Retour aux modèles
                </a>
                <h1 class="fw-bold mt-2 mb-1" style="font-family: 'Playfair Display', serif;">
                    👗 Ajouter un modèle
                </h1>
                <p class="text-muted">
                    Pagne : <strong style="color: #e94560;">{{ $produit->nom }}</strong>
                </p>
            </div>

            <div class="bg-white rounded-4 shadow-sm p-5">
                <form action="/admin/produits/{{ $produit->id }}/modeles/creer"
                      method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Genre -->
                   <!-- Genre -->
<div class="mb-4">
    <label class="form-label fw-500 mb-3">
        <i class="fas fa-venus-mars me-2" style="color: #e94560;"></i>
        Pour qui est ce modèle ?
    </label>
    <div class="row g-3">
        <div class="col-6">
            <input type="radio" name="genre" value="homme"
                   class="d-none" id="homme"
                   {{ old('genre') == 'homme' ? 'checked' : '' }}>
            <label for="homme"
                   class="genre-label w-100 text-center p-3 rounded-3"
                   style="border: 2px solid #eee; cursor: pointer; transition: all 0.3s; display: block;"
                   onclick="selectGenre('homme')">
                <div style="font-size: 2rem;">👔</div>
                <p class="fw-bold mb-0 mt-1 small">Homme</p>
            </label>
        </div>
        <div class="col-6">
            <input type="radio" name="genre" value="femme"
                   class="d-none" id="femme"
                   {{ old('genre') == 'femme' ? 'checked' : '' }}>
            <label for="femme"
                   class="genre-label w-100 text-center p-3 rounded-3"
                   style="border: 2px solid #eee; cursor: pointer; transition: all 0.3s; display: block;"
                   onclick="selectGenre('femme')">
                <div style="font-size: 2rem;">👗</div>
                <p class="fw-bold mb-0 mt-1 small">Femme</p>
            </label>
        </div>
        <div class="col-6">
            <input type="radio" name="genre" value="garcon"
                   class="d-none" id="garcon"
                   {{ old('genre') == 'garcon' ? 'checked' : '' }}>
            <label for="garcon"
                   class="genre-label w-100 text-center p-3 rounded-3"
                   style="border: 2px solid #eee; cursor: pointer; transition: all 0.3s; display: block;"
                   onclick="selectGenre('garcon')">
                <div style="font-size: 2rem;">👦</div>
                <p class="fw-bold mb-0 mt-1 small">Garçon</p>
            </label>
        </div>
        <div class="col-6">
            <input type="radio" name="genre" value="fille"
                   class="d-none" id="fille"
                   {{ old('genre') == 'fille' ? 'checked' : '' }}>
            <label for="fille"
                   class="genre-label w-100 text-center p-3 rounded-3"
                   style="border: 2px solid #eee; cursor: pointer; transition: all 0.3s; display: block;"
                   onclick="selectGenre('fille')">
                <div style="font-size: 2rem;">👧</div>
                <p class="fw-bold mb-0 mt-1 small">Fille</p>
            </label>
        </div>
    </div>
    @error('genre')
        <div class="text-danger small mt-2">{{ $message }}</div>
    @enderror
</div>

                    <!-- Nom -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-tag me-2" style="color: #e94560;"></i>
                            Nom du modèle
                        </label>
                        <input type="text" name="nom"
                               class="form-control rounded-3 py-3 @error('nom') is-invalid @enderror"
                               placeholder="Ex: Boubou traditionnel, Robe wax..."
                               value="{{ old('nom') }}"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-align-left me-2" style="color: #e94560;"></i>
                            Description (optionnel)
                        </label>
                        <textarea name="description" rows="3"
                                  class="form-control rounded-3"
                                  placeholder="Décrivez le style, l'occasion..."
                                  style="border: 2px solid #eee; transition: all 0.3s; resize: none;"
                                  onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                                  onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">{{ old('description') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-image me-2" style="color: #e94560;"></i>
                            Photo du modèle
                        </label>
                        <div class="rounded-3 p-4 text-center"
                             style="border: 2px dashed #eee; transition: all 0.3s;"
                             onmouseover="this.style.borderColor='#e94560'; this.style.background='#fff0f3'"
                             onmouseout="this.style.borderColor='#eee'; this.style.background='transparent'">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: #e94560;"></i>
                            <p class="text-muted small mb-2">
                                Choisissez une belle photo du modèle portant le pagne
                            </p>
                            <input type="file" name="image" accept="image/*"
                                   class="form-control rounded-3 @error('image') is-invalid @enderror"
                                   style="border: 2px solid #eee;"
                                   onchange="previewImage(this)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Prévisualisation -->
                        <div id="preview" class="mt-3 text-center d-none">
                            <img id="previewImg" src=""
                                 class="rounded-4 shadow-sm"
                                 style="max-height: 300px; max-width: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn flex-grow-1 rounded-pill py-3 fw-bold"
                                style="background: #e94560; color: white; border: none;
                                       font-size: 1rem; transition: all 0.3s;"
                                onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(233,69,96,0.4)'"
                                onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <i class="fas fa-plus me-2"></i>Ajouter le modèle
                        </button>
                        <a href="/admin/produits/{{ $produit->id }}/modeles"
                           class="btn rounded-pill py-3 px-4 fw-bold"
                           style="border: 2px solid #1a1a2e; color: #1a1a2e; transition: all 0.3s;"
                           onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
                           onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('preview').classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function selectGenre(genre) {
            document.getElementById(genre).checked = true;
            document.querySelectorAll('[onclick^="selectGenre"]').forEach(el => {
                el.style.borderColor = '#eee';
                el.style.background = 'transparent';
                el.style.color = '#1a1a2e';
            });
            event.currentTarget.style.borderColor = '#e94560';
            event.currentTarget.style.background = '#fff0f3';
        }
    </script>

@endsection