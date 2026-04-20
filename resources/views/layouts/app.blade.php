<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - E-Avɔ Lẹwa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1C0A00;
            --secondary: #6B2D0A;
            --accent: #E8A020;
            --accent2: #C41E3A;
            --gold: #FFD700;
            --light: #FFF9F0;
            --sand: #F5DEB3;
            --green: #2D6A4F;
        }

        * { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            background-color: var(--light);
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23E8A020' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* ========= TOP BAR ========= */
        .topbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: rgba(255,255,255,0.85);
            font-size: 0.8rem;
            padding: 8px 0;
            border-bottom: 2px solid var(--accent);
        }
        .topbar a { 
            color: rgba(255,255,255,0.85); 
            text-decoration: none; 
            transition: all 0.3s; 
        }
        .topbar a:hover { color: var(--gold); }

        /* ========= NAVBAR ========= */
        .navbar {
            background: white !important;
            padding: 10px 0;
            box-shadow: 0 4px 25px rgba(28,10,0,0.12);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 4px solid var(--accent);
        }

        .navbar::after {
            content: '◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆';
            display: block;
            color: var(--accent);
            font-size: 0.5rem;
            text-align: center;
            letter-spacing: 3px;
            padding: 2px 0;
            background: linear-gradient(135deg, #FFF9F0, #FFF3DC);
            border-top: 1px solid rgba(232,160,32,0.2);
        }

        .logo-img {
            height: 60px;
            width: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--accent);
            box-shadow: 0 4px 15px rgba(232,160,32,0.5);
            transition: all 0.3s;
        }

        .logo-img:hover {
            transform: scale(1.08) rotate(5deg);
            box-shadow: 0 8px 25px rgba(232,160,32,0.6);
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: 2px;
            text-shadow: 1px 1px 0px rgba(232,160,32,0.3);
        }

        .logo-text span { 
            color: var(--accent); 
            font-style: italic;
        }

        .logo-subtitle {
            font-size: 0.65rem;
            color: var(--secondary);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .nav-link-custom {
            color: var(--primary) !important;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.3s;
            position: relative;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link-custom:hover { color: var(--accent) !important; }
        .nav-link-custom:hover::after { width: 70%; }

        .btn-cart-custom {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
            position: relative;
            box-shadow: 0 4px 15px rgba(28,10,0,0.2);
        }

        .btn-cart-custom:hover {
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(232,160,32,0.4);
        }

        .btn-login {
            border: 2px solid var(--primary);
            color: var(--primary);
            border-radius: 50px;
            padding: 6px 20px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-login:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(28,10,0,0.3);
        }

        .btn-register {
            background: linear-gradient(135deg, var(--accent), #F5A623);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(232,160,32,0.3);
        }

        .btn-register:hover {
            background: linear-gradient(135deg, var(--accent2), #A01030);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(196,30,58,0.4);
        }

        .user-badge {
            background: linear-gradient(135deg, #FFF9F0, #FFF3DC);
            border: 1px solid rgba(232,160,32,0.3);
            border-radius: 50px;
            padding: 6px 16px;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .btn-logout {
            background: none;
            border: 2px solid #dc3545;
            color: #dc3545;
            border-radius: 50px;
            padding: 6px 16px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-3px);
        }

        /* ========= CARDS PRODUITS ========= */
        .product-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 20px rgba(28,10,0,0.08);
            background: white;
        }

        .product-card:hover {
            transform: translateY(-12px) scale(1.01);
            box-shadow: 0 25px 50px rgba(28,10,0,0.15);
        }

        .product-card .img-wrapper {
            overflow: hidden;
            height: 240px;
            position: relative;
            cursor: pointer;
        }

        .product-card .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .img-wrapper img {
            transform: scale(1.15);
        }

        .product-card .img-wrapper .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(28,10,0,0.7), rgba(107,45,10,0.6));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
            backdrop-filter: blur(3px);
        }

        .product-card:hover .img-wrapper .overlay { opacity: 1; }

        .overlay-btn {
            background: white;
            color: var(--primary);
            border: none;
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transform: translateY(25px);
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .product-card:hover .overlay-btn { transform: translateY(0); }

        .overlay-btn:hover {
            background: var(--accent);
            color: white;
            transform: scale(1.05);
        }

        .pagne-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, var(--accent), #F5A623);
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.75rem;
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(232,160,32,0.4);
            z-index: 2;
        }

        .no-image-placeholder {
            height: 240px;
            background: linear-gradient(135deg, #FFF3DC, #F5DEB3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        .price-tag {
            color: var(--accent);
            font-weight: 800;
            font-size: 1.2rem;
        }

        .btn-view {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 15px rgba(28,10,0,0.2);
        }

        .btn-view:hover {
            background: linear-gradient(135deg, var(--accent), #F5A623);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(232,160,32,0.4);
        }

        /* ========= SECTION TITLES ========= */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        .section-title::before {
            content: '◆';
            color: var(--accent);
            margin-right: 10px;
            font-size: 0.7em;
        }

        .section-title::after {
            content: '◆';
            color: var(--accent);
            margin-left: 10px;
            font-size: 0.7em;
        }

        .section-divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 10px auto 0;
            width: fit-content;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            width: 50px;
            height: 2px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
        }

        .section-divider span {
            color: var(--accent);
            font-size: 1rem;
        }

        /* ========= FOOTER ========= */
        footer { 
            background: linear-gradient(135deg, var(--primary), #2C1005);
            color: rgba(255,255,255,0.8);
            border-top: 4px solid var(--accent);
        }

        footer h5 {
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 12px;
            font-family: 'Playfair Display', serif;
        }

        footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border-radius: 2px;
        }

        footer a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        footer a:hover {
            color: var(--gold) !important;
            padding-left: 8px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(232,160,32,0.3);
            border-radius: 50%;
            color: white;
            margin-right: 8px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateY(-5px) rotate(10deg);
            padding-left: 0 !important;
            box-shadow: 0 8px 20px rgba(232,160,32,0.4);
        }

        .footer-pattern {
            background: rgba(232,160,32,0.1);
            padding: 8px 0;
            text-align: center;
            font-size: 0.6rem;
            color: var(--accent);
            letter-spacing: 5px;
        }

        .footer-bottom {
            background: rgba(0,0,0,0.4);
            padding: 15px 0;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.5);
        }

        /* ========= DIVERS ========= */
        .alert { border-radius: 16px; border: none; }

        .badge-cart {
            position: absolute;
            top: -6px;
            right: -6px;
            background: var(--accent2);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
        }

        .stat-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: default;
            border-left: 4px solid var(--accent) !important;
        }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(28,10,0,0.12) !important;
        }

        a, button, [onclick] { cursor: pointer !important; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--light); }
        ::-webkit-scrollbar-thumb { 
            background: linear-gradient(var(--accent), var(--accent2)); 
            border-radius: 4px;
        }

        ::selection {
            background: var(--accent);
            color: white;
        }

        /* ========= RESPONSIVE MOBILE ========= */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: white;
                border-radius: 16px;
                padding: 20px;
                margin-top: 10px;
                box-shadow: 0 10px 30px rgba(28,10,0,0.1);
                border: 1px solid rgba(232,160,32,0.2);
            }

            .nav-link-custom {
                display: block;
                padding: 10px 15px;
                border-radius: 10px;
                margin-bottom: 5px;
                border-bottom: 1px solid rgba(232,160,32,0.1);
            }

            .btn-cart-custom,
            .btn-login,
            .btn-register,
            .btn-logout,
            .user-badge {
                display: block;
                width: 100%;
                text-align: center;
                margin-bottom: 8px;
            }

            .logo-text { font-size: 1.5rem; }
            .logo-subtitle { font-size: 0.6rem; }
            .topbar { display: none; }
        }

        @media (max-width: 576px) {
            .container { padding: 0 15px; }
            .hero-section { min-height: 500px !important; }
            .product-card .img-wrapper { height: 200px; }
            #whatsapp-tooltip { display: none !important; }
            footer .col-md-4,
            footer .col-md-2,
            footer .col-md-3 { text-align: center; }
            footer h5::after { left: 50%; transform: translateX(-50%); }
            .social-icons { justify-content: center; display: flex; }
            .form-control { font-size: 16px !important; }
            .sticky-top { position: relative !important; top: auto !important; }
        }

        @media (max-width: 768px) {
            .produit-detail-img { height: 300px !important; }
            .table-responsive { font-size: 0.85rem; }
            .section-title { font-size: 1.5rem; }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Top Bar -->
    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <span>
                <i class="fas fa-phone me-2" style="color: var(--gold);"></i>+229 01 67 08 65 33
                &nbsp;&nbsp;
                <i class="fas fa-envelope me-2 ms-2" style="color: var(--gold);"></i>contact@e-avolewa.com
            </span>
            <span>
                <a href="#"><i class="fab fa-facebook me-2"></i></a>
                <a href="#"><i class="fab fa-instagram me-2"></i></a>
                <a href="#"><i class="fab fa-whatsapp me-2"></i></a>
                <a href="#"><i class="fab fa-tiktok me-2"></i></a>
                &nbsp;
                <i class="fas fa-map-marker-alt ms-2 me-1" style="color: var(--gold);"></i>
                Cotonou, Bénin
            </span>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                {{-- <img src="{{ asset('images/logo.png') }}" alt="E-Avɔ Lẹwa" class="logo-img"> --}}
                <div>
                    <div class="logo-text">E<span>-Avɔ Lẹwa</span></div>
                    <div class="logo-subtitle">Pagnes & Tissus Africains</div>
                </div>
            </a>

            <!-- Bouton hamburger mobile -->
            <div class="d-flex align-items-center gap-2 d-lg-none">
                <a href="/panier" class="btn-cart-custom position-relative"
                   style="padding: 6px 14px; font-size: 0.85rem;">
                    <i class="fas fa-shopping-bag"></i>
                    @php $panierCount = count(session()->get('panier', [])); @endphp
                    @if($panierCount > 0)
                        <span class="badge-cart">{{ $panierCount }}</span>
                    @endif
                </a>
                <button class="navbar-toggler border-0 p-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                        style="background: #FFF3DC; border-radius: 10px;">
                    <i class="fas fa-bars" style="color: #1C0A00; font-size: 1.2rem;"></i>
                </button>
            </div>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="d-flex align-items-center gap-2 flex-wrap ms-auto mt-3 mt-lg-0">
                    <a href="/" class="nav-link-custom">
                        <i class="fas fa-home me-1"></i>Accueil
                    </a>
                    <a href="/produits" class="nav-link-custom">
                        <i class="fas fa-store me-1"></i>Pagnes
                    </a>
                    <a href="/categories" class="nav-link-custom">
                        <i class="fas fa-th-large me-1"></i>Catégories
                    </a>

                    <!-- Panier desktop -->
                    <a href="/panier" class="btn-cart-custom position-relative d-none d-lg-inline-flex">
                        <i class="fas fa-shopping-bag me-1"></i>Panier
                        @php $panierCount = count(session()->get('panier', [])); @endphp
                        @if($panierCount > 0)
                            <span class="badge-cart">{{ $panierCount }}</span>
                        @endif
                    </a>

                    @auth
                        <a href="/commandes" class="nav-link-custom">
                            <i class="fas fa-box me-1"></i>Commandes
                        </a>
                        <span class="user-badge">
                            <i class="fas fa-user-circle me-1" style="color: var(--accent);"></i>
                            {{ Auth::user()->name }}
                        </span>
                        <form action="/deconnexion" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-logout">
                                <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="/connexion" class="btn-login">
                            <i class="fas fa-sign-in-alt me-1"></i>Connexion
                        </a>
                        <a href="/inscription" class="btn-register">
                            <i class="fas fa-user-plus me-1"></i>Inscription
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mt-4 flex-grow-1">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="mt-5 pt-5 pb-0">
        <div class="container pb-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>E-Avɔ Lẹwa</h5>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; line-height: 1.8;">
                        Votre boutique de pagnes et tissus africains de qualité au Bénin.
                        Vlisco, Wax, Super, Bazin et bien plus encore.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Navigation</h5>
                    <a href="/"><i class="fas fa-chevron-right me-2 small"></i>Accueil</a>
                    <a href="/produits"><i class="fas fa-chevron-right me-2 small"></i>Pagnes</a>
                    <a href="/categories"><i class="fas fa-chevron-right me-2 small"></i>Catégories</a>
                    <a href="/panier"><i class="fas fa-chevron-right me-2 small"></i>Panier</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Nos Pagnes</h5>
                    <a href="#"><i class="fas fa-chevron-right me-2 small"></i>Vlisco</a>
                    <a href="#"><i class="fas fa-chevron-right me-2 small"></i>Wax Hollandais</a>
                    <a href="#"><i class="fas fa-chevron-right me-2 small"></i>Super de Lomé</a>
                    <a href="#"><i class="fas fa-chevron-right me-2 small"></i>Bazin</a>
                    <a href="#"><i class="fas fa-chevron-right me-2 small"></i>Kente</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact</h5>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 10px;">
                        <i class="fas fa-envelope me-2" style="color: var(--accent)"></i>
                        contact@e-avolewa.com
                    </p>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 10px;">
                        <i class="fas fa-phone me-2" style="color: var(--accent)"></i>
                        +229 01 67 08 65 33
                    </p>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 10px;">
                        <i class="fab fa-whatsapp me-2" style="color: var(--accent)"></i>
                        +229 01 67 08 65 33
                    </p>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">
                        <i class="fas fa-map-marker-alt me-2" style="color: var(--accent)"></i>
                        Cotonou, Bénin
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-pattern">
            ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆ ◇ ◆
        </div>
        <div class="footer-bottom">
            <div class="container text-center">
                © {{ date('Y') }} E-Avɔ Lẹwa — Tous droits réservés.
                Fait avec ❤️ au Bénin 🇧🇯
            </div>
        </div>
    </footer>

    <!-- Bouton WhatsApp flottant -->
    <a href="https://wa.me/2290167086533?text=Bonjour%20E-Avɔ%20Lẹwa%2C%20je%20suis%20intéressé%20par%20vos%20pagnes%20!"
       target="_blank"
       style="position: fixed; bottom: 30px; right: 30px; z-index: 9999;
              width: 60px; height: 60px; border-radius: 50%;
              background: linear-gradient(135deg, #25D366, #128C7E);
              display: flex; align-items: center; justify-content: center;
              box-shadow: 0 8px 25px rgba(37,211,102,0.5);
              transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
              text-decoration: none;"
       onmouseover="this.style.transform='scale(1.2) rotate(10deg)';
                    this.style.boxShadow='0 15px 40px rgba(37,211,102,0.6)'"
       onmouseout="this.style.transform='scale(1) rotate(0deg)';
                   this.style.boxShadow='0 8px 25px rgba(37,211,102,0.5)'">
        <i class="fab fa-whatsapp" style="color: white; font-size: 1.8rem;"></i>
        <span style="position: absolute; top: -5px; right: -5px;
                     width: 20px; height: 20px; border-radius: 50%;
                     background: #E8A020; border: 2px solid white;
                     animation: pulse 2s infinite;">
        </span>
    </a>

    <!-- Tooltip WhatsApp -->
    <div id="whatsapp-tooltip"
         style="position: fixed; bottom: 38px; right: 100px; z-index: 9998;
                background: white; padding: 8px 16px; border-radius: 50px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                font-size: 0.85rem; font-weight: 600; color: #1C0A00;
                white-space: nowrap; pointer-events: none;
                border: 1px solid rgba(37,211,102,0.3);">
        <i class="fab fa-whatsapp me-2" style="color: #25D366;"></i>
        Commander via WhatsApp
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>