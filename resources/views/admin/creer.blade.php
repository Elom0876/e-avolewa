@extends('layouts.app')

@section('title', 'Ajouter un pagne')

@section('content')

    <div class="row justify-content-center py-4">
        <div class="col-md-9">

            <!-- Header -->
            <div class="mb-4">
                <a href="/admin" class="text-muted text-decoration-none small"
                   onmouseover="this.style.color='#e94560'"
                   onmouseout="this.style.color='#6c757d'">
                    <i class="fas fa-arrow-left me-2"></i>Retour à l'admin
                </a>
                <h1 class="fw-bold mt-2 mb-1" style="font-family: 'Playfair Display', serif;">
                    ➕ Ajouter un pagne
                </h1>
                <p class="text-muted">Remplissez les informations du nouveau pagne</p>
            </div>

            <div class="bg-white rounded-4 shadow-sm p-5">
                <form action="/admin/produits/creer" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <!-- Nom -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-tag me-2" style="color: #e94560;"></i>Nom du pagne
                            </label>
                            <input type="text" name="nom"
                                   class="form-control rounded-3 py-3 @error('nom') is-invalid @enderror"
                                   placeholder="Ex: Wax floral rouge"
                                   value="{{ old('nom') }}"
                                   style="border: 2px solid #eee; transition: all 0.3s;"
                                   onfocus="this.style.borderColor='#e94560'"
                                   onblur="this.style.borderColor='#eee'">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Couleur -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-palette me-2" style="color: #e94560;"></i>Couleur(s)
                            </label>
                            <input type="text" name="couleur"
                                   class="form-control rounded-3 py-3"
                                   placeholder="Ex: Rouge et or, Bleu et blanc..."
                                   value="{{ old('couleur') }}"
                                   style="border: 2px solid #eee; transition: all 0.3s;"
                                   onfocus="this.style.borderColor='#e94560'"
                                   onblur="this.style.borderColor='#eee'">
                        </div>

                        <!-- Type de pagne -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-layer-group me-2" style="color: #e94560;"></i>Type de pagne
                            </label>
                            <select name="type_pagne_id" class="form-control rounded-3 py-3"
                                    style="border: 2px solid #eee; transition: all 0.3s;"
                                    onfocus="this.style.borderColor='#e94560'"
                                    onblur="this.style.borderColor='#eee'">
                                <option value="">-- Choisir le type --</option>
                                @foreach($typesPagnes as $type)
                                    <option value="{{ $type->id }}"
                                            {{ old('type_pagne_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->nom }}
                                        @if($type->origine) ({{ $type->origine }}) @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Catégorie -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-users me-2" style="color: #e94560;"></i>Pour qui ?
                            </label>
                            <select name="categorie_id" class="form-control rounded-3 py-3"
                                    style="border: 2px solid #eee; transition: all 0.3s;"
                                    onfocus="this.style.borderColor='#e94560'"
                                    onblur="this.style.borderColor='#eee'">
                                <option value="">-- Choisir la catégorie --</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                            {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-align-left me-2" style="color: #e94560;"></i>Description
                            </label>
                            <textarea name="description" rows="3"
                                      class="form-control rounded-3 @error('description') is-invalid @enderror"
                                      placeholder="Décrivez le pagne, son origine, ses motifs..."
                                      style="border: 2px solid #eee; transition: all 0.3s; resize: none;"
                                      onfocus="this.style.borderColor='#e94560'"
                                      onblur="this.style.borderColor='#eee'">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Prix de base et stock -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-money-bill me-2" style="color: #e94560;"></i>Prix de base (FCFA)
                            </label>
                            <input type="number" name="prix"
                                   class="form-control rounded-3 py-3 @error('prix') is-invalid @enderror"
                                   placeholder="Ex: 5000"
                                   value="{{ old('prix') }}"
                                   style="border: 2px solid #eee; transition: all 0.3s;"
                                   onfocus="this.style.borderColor='#e94560'"
                                   onblur="this.style.borderColor='#eee'">
                            @error('prix')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-box me-2" style="color: #e94560;"></i>Stock total
                            </label>
                            <input type="number" name="stock"
                                   class="form-control rounded-3 py-3 @error('stock') is-invalid @enderror"
                                   placeholder="Ex: 50"
                                   value="{{ old('stock') }}"
                                   style="border: 2px solid #eee; transition: all 0.3s;"
                                   onfocus="this.style.borderColor='#e94560'"
                                   onblur="this.style.borderColor='#eee'">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-12 mb-4">
                            <label class="form-label fw-500 mb-2">
                                <i class="fas fa-image me-2" style="color: #e94560;"></i>Photo du pagne
                            </label>
                            <div class="rounded-3 p-4 text-center"
                                 style="border: 2px dashed #eee; transition: all 0.3s;"
                                 onmouseover="this.style.borderColor='#e94560'; this.style.background='#fff0f3'"
                                 onmouseout="this.style.borderColor='#eee'; this.style.background='transparent'">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: #e94560;"></i>
                                <p class="text-muted small mb-2">Choisissez une belle photo du pagne</p>
                                <input type="file" name="image" accept="image/*"
                                       class="form-control rounded-3"
                                       style="border: 2px solid #eee;"
                                       onchange="previewImage(this)">
                            </div>
                            <div id="preview" class="mt-3 text-center d-none">
                                <img id="previewImg" src=""
                                     class="rounded-4 shadow-sm"
                                     style="max-height: 200px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- Longueurs disponibles -->
                        <div class="col-12 mb-4">
                            <label class="form-label fw-500 mb-3">
                                <i class="fas fa-ruler me-2" style="color: #e94560;"></i>
                                Longueurs disponibles et prix
                            </label>
                            <div class="p-4 rounded-3" style="background: #f8f9ff; border: 2px solid #eee;">
                                <div class="row g-3">
                                    @foreach(['2m', '4m', '6m', '12m'] as $longueur)
                                        <div class="col-md-6">
                                            <div class="p-3 bg-white rounded-3 shadow-sm">
                                                <div class="d-flex align-items-center mb-2">
                                                    <input type="checkbox"
                                                           name="longueurs[{{ $longueur }}][actif]"
                                                           id="longueur_{{ $longueur }}"
                                                           value="1"
                                                           class="me-2"
                                                           onchange="toggleLongueur('{{ $longueur }}')">
                                                    <label for="longueur_{{ $longueur }}"
                                                           class="fw-bold mb-0"
                                                           style="cursor: pointer; font-size: 1.1rem;">
                                                        📏 {{ $longueur }}
                                                    </label>
                                                </div>
                                                <div id="fields_{{ $longueur }}" style="display: none;">
                                                    <div class="row g-2 mt-1">
                                                        <div class="col-6">
                                                            <input type="number"
                                                                   name="longueurs[{{ $longueur }}][prix]"
                                                                   class="form-control rounded-3"
                                                                   placeholder="Prix FCFA"
                                                                   style="border: 2px solid #eee;">
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="number"
                                                                   name="longueurs[{{ $longueur }}][stock]"
                                                                   class="form-control rounded-3"
                                                                   placeholder="Stock"
                                                                   style="border: 2px solid #eee;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn flex-grow-1 rounded-pill py-3 fw-bold"
                                style="background: #e94560; color: white; border: none;
                                       font-size: 1rem; transition: all 0.3s;"
                                onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
                                onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                            <i class="fas fa-plus me-2"></i>Ajouter le pagne
                        </button>
                        <a href="/admin" class="btn rounded-pill py-3 px-4 fw-bold"
                           style="border: 2px solid #1a1a2e; color: #1a1a2e; transition: all 0.3s;"
                           onmouseover="this.style.background='#1a1a2e'; this.style.color='white'"
                           onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleLongueur(longueur) {
            const fields = document.getElementById('fields_' + longueur);
            const checkbox = document.getElementById('longueur_' + longueur);
            fields.style.display = checkbox.checked ? 'block' : 'none';
        }

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
    </script>

@endsection