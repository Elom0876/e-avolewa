@extends('layouts.app')

@section('title', 'Catégories')

@section('content')

    <!-- Header -->
    <div class="text-center py-4 mb-5">
        <h1 class="fw-bold section-title" style="font-family: 'Playfair Display', serif;">
            Nos Catégories
        </h1>
        <div class="section-divider mx-auto"><span>👗</span></div>
        <p class="text-muted mt-3">Trouvez facilement les pagnes qui vous correspondent</p>
    </div>

    <div class="row g-4">
        @foreach($categories as $categorie)
            <div class="col-md-4">
                <a href="/categories/{{ $categorie->id }}" class="text-decoration-none">
                    <div class="rounded-4 overflow-hidden position-relative shadow"
                         style="height: 280px;
                                background: {{ $categorie->type == 'homme' ?
                                    'linear-gradient(135deg, #1C0A00, #6B2D0A)' :
                                    ($categorie->type == 'femme' ?
                                    'linear-gradient(135deg, #C41E3A, #8B0000)' :
                                    'linear-gradient(135deg, #2D6A4F, #1B4332)') }};
                                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                cursor: pointer;"
                         onmouseover="this.style.transform='translateY(-10px) scale(1.02)';
                                      this.style.boxShadow='0 30px 60px rgba(0,0,0,0.3)'"
                         onmouseout="this.style.transform='translateY(0) scale(1)';
                                     this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">

                        <!-- Motif décoratif -->
                        <div style="position: absolute; inset: 0;
                                    background: repeating-linear-gradient(
                                        45deg, rgba(232,160,32,0.05) 0px,
                                        rgba(232,160,32,0.05) 2px,
                                        transparent 2px, transparent 30px);">
                        </div>

                        <!-- Cercle lumineux -->
                        <div style="position: absolute; width: 200px; height: 200px;
                                    border-radius: 50%; top: -50px; right: -50px;
                                    background: radial-gradient(circle, rgba(255,255,255,0.08), transparent);
                                    pointer-events: none;">
                        </div>

                        <div style="position: absolute; inset: 0; display: flex;
                                    flex-direction: column; align-items: center;
                                    justify-content: center; color: white; z-index: 1;">

                            <!-- Icône -->
                            <div style="font-size: 4.5rem; margin-bottom: 15px;
                                        filter: drop-shadow(0 8px 20px rgba(0,0,0,0.4));
                                        animation: float {{ $loop->index % 2 == 0 ? '4' : '5' }}s ease-in-out infinite;">
                                {{ $categorie->type == 'homme' ? '👔' : ($categorie->type == 'femme' ? '👗' : '👨‍👩‍👧‍👦') }}
                            </div>

                            <h3 class="fw-bold mb-2"
                                style="font-family: 'Playfair Display', serif; font-size: 1.8rem;
                                       text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                                {{ $categorie->nom }}
                            </h3>

                            <p style="color: rgba(255,255,255,0.75); font-size: 0.9rem; margin-bottom: 15px;">
                                {{ $categorie->description }}
                            </p>

                            <!-- Nombre de produits -->
                            <div class="px-4 py-2 rounded-pill"
                                 style="background: rgba(255,255,255,0.15);
                                        border: 1px solid rgba(255,255,255,0.3);
                                        font-size: 0.85rem; font-weight: 600;">
                                <i class="fas fa-tag me-2" style="color: #FFD700;"></i>
                                {{ $categorie->produits_count }} pagne(s)
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
    </style>

@endsection