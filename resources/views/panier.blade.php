@extends('layouts.app')

@section('title', 'Mon Panier')

@section('content')

    <!-- Header -->
    <div class="text-center py-4 mb-5">
        <h1 class="fw-bold" style="font-family: 'Playfair Display', serif;">
            🛒 Mon Panier
        </h1>
        <p class="text-muted">Vérifiez vos articles avant de commander</p>
        <hr style="width: 60px; border: 2px solid #e94560; margin: 15px auto 0;">
    </div>

    @if(count($panier) == 0)
        <!-- Panier vide -->
        <div class="text-center py-5">
            <div style="font-size: 5rem;">🛒</div>
            <h3 class="fw-bold mt-3 mb-2">Votre panier est vide</h3>
            <p class="text-muted mb-4">Vous n'avez pas encore ajouté de produits.</p>
            <a href="/produits" class="btn btn-lg rounded-pill px-5 py-3 fw-bold"
               style="background: #e94560; color: white; border: none; transition: all 0.3s;"
               onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
               onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                <i class="fas fa-store me-2"></i>Découvrir nos produits
            </a>
        </div>

    @else
        <div class="row">

            <!-- Articles -->
            <div class="col-lg-8 mb-4">
                <div class="bg-white rounded-4 shadow-sm p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="fas fa-shopping-bag me-2" style="color: #e94560;"></i>
                        {{ count($panier) }} article(s) dans votre panier
                    </h5>

                    @foreach($panier as $id => $item)
                        <div class="d-flex align-items-center p-3 mb-3 rounded-3"
                             style="background: #f8f9ff; border: 1px solid #eee; transition: all 0.3s;"
                             onmouseover="this.style.boxShadow='0 5px 15px rgba(0,0,0,0.08)'; this.style.transform='translateX(5px)'"
                             onmouseout="this.style.boxShadow='none'; this.style.transform='translateX(0)'">

                            <!-- Icône -->
                            <div class="me-3 d-flex align-items-center justify-content-center rounded-3"
                                 style="width: 70px; height: 70px;
                                        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
                                        font-size: 2rem; flex-shrink: 0;">
                                📦
                            </div>

                            <!-- Infos -->
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">{{ $item['nom'] }}</h6>
                                <p class="text-muted small mb-0">
                                    Prix unitaire :
                                    <strong style="color: #e94560;">
                                        {{ number_format($item['prix'], 0, ',', ' ') }} FCFA
                                    </strong>
                                </p>
                            </div>

                            <!-- Quantité -->
                            <div class="text-center mx-3">
                                <span class="badge rounded-pill px-3 py-2"
                                      style="background: #1a1a2e; color: white; font-size: 0.9rem;">
                                    x{{ $item['quantite'] }}
                                </span>
                            </div>

                            <!-- Sous-total -->
                            <div class="text-end mx-3">
                                <span class="fw-bold" style="color: #e94560; font-size: 1.1rem;">
                                    {{ number_format($item['prix'] * $item['quantite'], 0, ',', ' ') }} FCFA
                                </span>
                            </div>

                            <!-- Supprimer -->
                            <a href="/panier/supprimer/{{ $id }}"
                               onclick="return confirm('Supprimer cet article ?')"
                               class="btn rounded-circle d-flex align-items-center justify-content-center ms-2"
                               style="width: 40px; height: 40px; background: #fff0f3;
                                      color: #e94560; border: none; flex-shrink: 0;
                                      transition: all 0.3s;"
                               onmouseover="this.style.background='#e94560'; this.style.color='white'; this.style.transform='scale(1.1)'"
                               onmouseout="this.style.background='#fff0f3'; this.style.color='#e94560'; this.style.transform='scale(1)'">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    @endforeach

                    <div class="mt-3">
                        <a href="/produits" class="btn rounded-pill px-4 py-2"
                           style="border: 2px solid #1a1a2e; color: #1a1a2e;
                                  font-weight: 500; transition: all 0.3s;"
                           onmouseover="this.style.background='#1a1a2e'; this.style.color='white'; this.style.transform='translateY(-3px)'"
                           onmouseout="this.style.background='transparent'; this.style.color='#1a1a2e'; this.style.transform='translateY(0)'">
                            <i class="fas fa-arrow-left me-2"></i>Continuer les achats
                        </a>
                    </div>
                </div>
            </div>

            <!-- Résumé -->
            <div class="col-lg-4 mb-4">
                <div class="bg-white rounded-4 shadow-sm p-4 sticky-top" style="top: 100px;">
                    <h5 class="fw-bold mb-4">
                        <i class="fas fa-receipt me-2" style="color: #e94560;"></i>
                        Résumé de la commande
                    </h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Sous-total</span>
                        <span class="fw-500">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Livraison</span>
                        <span class="fw-bold" style="color: #28a745;">Gratuite 🎉</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-5" style="color: #e94560;">
                            {{ number_format($total, 0, ',', ' ') }} FCFA
                        </span>
                    </div>

                    @auth
                        <form action="/commandes" method="POST">
                            @csrf
                            <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold"
                                    style="background: #1a1a2e; color: white; border: none;
                                           font-size: 1rem; transition: all 0.3s;"
                                    onmouseover="this.style.background='#e94560'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(233,69,96,0.4)'"
                                    onmouseout="this.style.background='#1a1a2e'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="fas fa-check-circle me-2"></i>Commander maintenant
                            </button>
                        </form>
                    @else
                        <a href="/connexion" class="btn w-100 rounded-pill py-3 fw-bold"
                           style="background: #e94560; color: white; border: none;
                                  font-size: 1rem; transition: all 0.3s;"
                           onmouseover="this.style.background='#c73652'; this.style.transform='translateY(-3px)'"
                           onmouseout="this.style.background='#e94560'; this.style.transform='translateY(0)'">
                            <i class="fas fa-sign-in-alt me-2"></i>Connectez-vous pour commander
                        </a>
                    @endauth

                    <!-- Garanties -->
                    <div class="mt-4 pt-3" style="border-top: 1px solid #eee;">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-shield-alt me-3" style="color: #e94560; width: 16px;"></i>
                            <span class="small text-muted">Paiement 100% sécurisé</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-truck me-3" style="color: #e94560; width: 16px;"></i>
                            <span class="small text-muted">Livraison rapide à Cotonou</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-undo me-3" style="color: #e94560; width: 16px;"></i>
                            <span class="small text-muted">Retour facile sous 7 jours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection