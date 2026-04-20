@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">✏️ Modifier un produit</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/produits/modifier/{{ $produit->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nom du produit</label>
                            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $produit->nom) }}">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $produit->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prix (FCFA)</label>
                            <input type="number" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $produit->prix) }}">
                            @error('prix')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $produit->stock) }}">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Catégorie -->
                        <div class="mb-4">
                         <label class="form-label fw-500 mb-2">
                             <i class="fas fa-th-large me-2" style="color: #e94560;"></i>Catégorie
                         </label>
                          <select name="categorie_id" class="form-control rounded-3 py-3"
                             style="border: 2px solid #eee; transition: all 0.3s;"
                              onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                                onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                             <option value="">-- Choisir une catégorie --</option>
                             @foreach($categories as $categorie)
                                 <option value="{{ $categorie->id }}"
                                     {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                                       {{ $categorie->nom }}
                                  </option>
                             @endforeach
                         </select>
                      </div>

                    <!-- Image -->
                   <div class="mb-4">
                     <label class="form-label fw-500 mb-2">
                         <i class="fas fa-image me-2" style="color: #e94560;"></i>Changer l'image
                     </label>
                      @if($produit->image)
                          <div class="mb-2">
                              <img src="{{ asset('storage/' . $produit->image) }}"
                             style="height: 100px; width: 100px; object-fit: cover; border-radius: 10px;">
                         </div>
                      @endif
                      <input type="file" name="image" accept="image/*"
                       class="form-control rounded-3"
                      style="border: 2px solid #eee;">
                   </div> 
                        <button type="submit" class="btn btn-warning w-100">✏️ Modifier</button>
                        <a href="/admin" class="btn btn-outline-secondary w-100 mt-2">← Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection