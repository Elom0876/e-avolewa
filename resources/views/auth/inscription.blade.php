@extends('layouts.app')

@section('title', 'Inscription')

@section('content')

    <div class="row justify-content-center py-5">
        <div class="col-md-6">

            <!-- Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">
                    Rejoignez-nous ! 🎉
                </h2>
                <p class="text-muted">Créez votre compte elom'Store gratuitement</p>
            </div>

            <div class="bg-white rounded-4 shadow-sm p-5">

                @if(session('success'))
                    <div class="alert alert-success rounded-3 mb-4">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <form action="/inscription" method="POST">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-user me-2" style="color: #e94560;"></i>Nom complet
                        </label>
                        <input type="text" name="name"
                               class="form-control rounded-3 py-3 @error('name') is-invalid @enderror"
                               placeholder="Votre nom complet"
                               value="{{ old('name') }}"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-envelope me-2" style="color: #e94560;"></i>Adresse email
                        </label>
                        <input type="email" name="email"
                               class="form-control rounded-3 py-3 @error('email') is-invalid @enderror"
                               placeholder="votre@email.com"
                               value="{{ old('email') }}"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-lock me-2" style="color: #e94560;"></i>Mot de passe
                        </label>
                        <input type="password" name="password"
                               class="form-control rounded-3 py-3 @error('password') is-invalid @enderror"
                               placeholder="Minimum 6 caractères"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirmer mot de passe -->
                    <div class="mb-4">
                        <label class="form-label fw-500 mb-2">
                            <i class="fas fa-lock me-2" style="color: #e94560;"></i>Confirmer le mot de passe
                        </label>
                        <input type="password" name="password_confirmation"
                               class="form-control rounded-3 py-3"
                               placeholder="Répétez votre mot de passe"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold mb-3"
                            style="background: #e94560; color: white; border: none;
                                   font-size: 1rem; transition: all 0.3s;"
                            onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(233,69,96,0.4)'"
                            onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <i class="fas fa-user-plus me-2"></i>Créer mon compte
                    </button>

                    <!-- Avantages -->
                    <div class="p-3 rounded-3 mb-3" style="background: #f8f9ff;">
                        <p class="small text-muted mb-1">
                            <i class="fas fa-check text-success me-2"></i>Accès à votre historique de commandes
                        </p>
                        <p class="small text-muted mb-1">
                            <i class="fas fa-check text-success me-2"></i>Livraison rapide à Cotonou
                        </p>
                        <p class="small text-muted mb-0">
                            <i class="fas fa-check text-success me-2"></i>Offres et promotions exclusives
                        </p>
                    </div>
                </form>

                <hr class="my-4">

                <p class="text-center text-muted mb-0">
                    Déjà un compte ?
                    <a href="/connexion" class="fw-bold text-decoration-none"
                       style="color: #e94560;">
                        Se connecter
                    </a>
                </p>
            </div>
        </div>
    </div>

@endsection