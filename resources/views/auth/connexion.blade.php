@extends('layouts.app')

@section('title', 'Connexion')

@section('content')

    <div class="row justify-content-center py-5">
        <div class="col-md-5">

            <!-- Header -->
            <div class="text-center mb-4">
                <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">
                    Bon retour ! 👋
                </h2>
                <p class="text-muted">Connectez-vous à votre compte elom'Store</p>
            </div>

            <div class="bg-white rounded-4 shadow-sm p-5">

                @if(session('error'))
                    <div class="alert alert-danger rounded-3 mb-4">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success rounded-3 mb-4">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <form action="/connexion" method="POST">
                    @csrf

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
                               class="form-control rounded-3 py-3"
                               placeholder="••••••••"
                               style="border: 2px solid #eee; transition: all 0.3s;"
                               onfocus="this.style.borderColor='#e94560'; this.style.boxShadow='0 0 0 3px rgba(233,69,96,0.1)'"
                               onblur="this.style.borderColor='#eee'; this.style.boxShadow='none'">
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold mb-3"
                            style="background: #1a1a2e; color: white; border: none;
                                   font-size: 1rem; transition: all 0.3s;"
                            onmouseover="this.style.background='#e94560'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(233,69,96,0.4)'"
                            onmouseout="this.style.background='#1a1a2e'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                    </button>
                </form>

                <hr class="my-4">

                <p class="text-center text-muted mb-0">
                    Pas encore de compte ?
                    <a href="/inscription" class="fw-bold text-decoration-none"
                       style="color: #e94560;">
                        S'inscrire gratuitement
                    </a>
                </p>
            </div>
        </div>
    </div>

@endsection