@extends('layouts.app')

@section('title', 'Modèles - ' . $produit->nom)

@section('content')

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <a href="/admin" class="text-muted text-decoration-none small">
                <i class="fas fa-arrow-left me-2"></i>Retour admin
            </a>
            <h1 class="fw-bold mt-2 mb-1" style="font-family: 'Playfair Display', serif;">
                👗 Modèles — {{ $produit->nom }}
            </h1>
            <p class="text-muted mb-0">Gérez les tenues réalisables avec ce pagne</p>
        </div>
        <a href="/admin/produits/{{ $produit->id }}/modeles/creer"
           class="btn rounded-pill px-4 py-2 fw-bold"
           style="background: #e94560; color: white; border: none; transition: all 0.3s;"
           onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
           onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
            <i class="fas fa-plus me-2"></i>Ajouter un modèle
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <!-- Modèles Homme -->
    <div class="mb-5">
        <h4 class="fw-bold mb-4">
            <span class="badge rounded-pill px-3 py-2 me-2"
                  style="background: #e3f2fd; color: #1565c0; font-size: 0.9rem;">
                👔 Homme
            </span>
            {{ $modeles->where('genre', 'homme')->count() }} modèle(s)
        </h4>
        <div class="row">
            @forelse($modeles->where('genre', 'homme') as $modele)
                <div class="col-md-3 mb-4">
                    <div class="bg-white rounded-4 shadow-sm overflow-hidden"
                         style="transition: all 0.3s;"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $modele->image) }}"
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s;"
                                 onmouseover="this.style.transform='scale(1.1)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">{{ $modele->nom }}</h6>
                            @if($modele->description)
                                <p class="text-muted small mb-2">{{ $modele->description }}</p>
                            @endif
                            <a href="/admin/modeles/{{ $modele->id }}/supprimer"
                               onclick="return confirm('Supprimer ce modèle ?')"
                               class="btn rounded-pill px-3 py-1 small fw-500 w-100"
                               style="background: #fff0f3; color: #e94560; border: none; transition: all 0.3s;"
                               onmouseover="this.style.background='#e94560'; this.style.color='white'"
                               onmouseout="this.style.background='#fff0f3'; this.style.color='#e94560'">
                                <i class="fas fa-trash me-1"></i>Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Aucun modèle homme pour ce pagne.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modèles Femme -->
    <div class="mb-5">
        <h4 class="fw-bold mb-4">
            <span class="badge rounded-pill px-3 py-2 me-2"
                  style="background: #fce4ec; color: #c62828; font-size: 0.9rem;">
                👗 Femme
            </span>
            {{ $modeles->where('genre', 'femme')->count() }} modèle(s)
        </h4>
        <div class="row">
            @forelse($modeles->where('genre', 'femme') as $modele)
                <div class="col-md-3 mb-4">
                    <div class="bg-white rounded-4 shadow-sm overflow-hidden"
                         style="transition: all 0.3s;"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.06)'">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $modele->image) }}"
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s;"
                                 onmouseover="this.style.transform='scale(1.1)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-1">{{ $modele->nom }}</h6>
                            @if($modele->description)
                                <p class="text-muted small mb-2">{{ $modele->description }}</p>
                            @endif
                            <a href="/admin/modeles/{{ $modele->id }}/supprimer"
                               onclick="return confirm('Supprimer ce modèle ?')"
                               class="btn rounded-pill px-3 py-1 small fw-500 w-100"
                               style="background: #fff0f3; color: #e94560; border: none; transition: all 0.3s;"
                               onmouseover="this.style.background='#e94560'; this.style.color='white'"
                               onmouseout="this.style.background='#fff0f3'; this.style.color='#e94560'">
                                <i class="fas fa-trash me-1"></i>Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Aucun modèle femme pour ce pagne.</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection