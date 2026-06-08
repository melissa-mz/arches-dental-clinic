<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Clinique Lebdiri – Soins dentaires 24h/24</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #d1c9c7;
            color: #212529;
            line-height: 1.5;
            padding-top: 76px;
        }
        /* ========== NAVBAR ========== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(243, 236, 236, 0.65);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 100;
            padding: 12px 0;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .logo img {
            height: 46px;
            width: auto;
            border-radius: 8px;
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            font-style: italic;
            color: #212529;
            letter-spacing: 0.5px;
        }
        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #2C3E50;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover {
            color: #D4AF37;
        }
        .btn-rdv-nav {
            background: #D4AF37;
            color: #212529;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn-rdv-nav:hover {
            background: #C5A028;
            color: #212529;
        }
        /* ========== HÉROS VIDÉO ========== */
        .hero-video {
            position: relative;
            width: 100%;
            height: 85vh;
            overflow: hidden;
        }
        .hero-video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            text-align: left;
            color: white;
            padding: 0 10%;
        }
        .hero-overlay h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: #FFFFFF;
            text-shadow: 0 4px 15px rgba(0,0,0,0.4);
        }
        .hero-overlay p {
            font-size: 1.3rem;
            max-width: 600px;
            margin-bottom: 2rem;
            color: #FFFFFF;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
            line-height: 1.4;
        }
        .hero-overlay .btn {
            background: transparent;
            color: #D4AF37;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            border: 1.5px solid #D4AF37;
            backdrop-filter: blur(4px);
            transition: all 0.3s ease;
            display: inline-block;
            letter-spacing: 0.5px;
        }
        .hero-overlay .btn:hover {
            background: #D4AF37;
            color: #212529;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }
        /* ========== SECTION À PROPOS ========== */
        .about-section {
            background: #FFFFFF;
            padding: 60px 20px;
        }
        .about-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        .about-text {
            flex: 1;
            min-width: 250px;
        }
        .about-text h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #212529;
            margin-bottom: 20px;
        }
        .about-text p {
            color: #5A6B7C;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }
        .about-text p:first-of-type::first-letter {
            font-size: 3rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #D4AF37;
            float: left;
            line-height: 0.8;
            margin-right: 8px;
            text-transform: uppercase;
        }
        .about-image {
            flex: 1;
            min-width: 250px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s;
        }
        .about-image img:hover {
            transform: scale(1.02);
        }
        /* ========== SERVICES ========== */
        .services {
            background: #FFFFFF;
            padding: 50px 20px;
            border-radius: 32px 32px 0 0;
            margin-top: 0;
        }
        .services-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .services-header h2 {
            font-size: 2rem;
            color: #212529;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: 'Playfair Display', serif;
        }
        .services-header h2 i {
            color: #D4AF37;
        }
        .services-header p {
            color: #5A6B7C;
            font-size: 1rem;
            max-width: 700px;
            margin: 10px auto 0;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .service-card {
            background: #FFFFFF;
            border-radius: 24px;
            padding: 20px 20px 20px 20px;
            text-align: left;
            transition: all 0.25s ease;
            border: 1px solid rgba(0, 0, 0, 0.04);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }
        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.06);
            border-color: #D4AF37;
        }
        .service-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }
        .service-icon-small {
            font-size: 1.8rem;
            color: #D4AF37;
            width: 44px;
            text-align: center;
        }
        .service-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            color: #212529;
            font-family: 'Playfair Display', serif;
        }
        .service-card p {
            color: #5A6B7C;
            line-height: 1.5;
            font-size: 0.85rem;
            margin-bottom: 12px;
        }
        .service-details {
            list-style: none;
            padding-left: 0;
            margin-top: 8px;
            border-top: 1px solid #EDF2F7;
            padding-top: 10px;
        }
        .service-details li {
            font-size: 0.8rem;
            color: #4A5A6A;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .service-details li i {
            color: #D4AF37;
            font-size: 0.7rem;
            width: 18px;
        }
        /* ========== GALERIE (carrousel) ========== */
        .gallery {
            background: #F5F7FA;
            padding: 50px 20px;
        }
        .gallery-header {
            text-align: center;
            margin-bottom: 35px;
        }
        .gallery-header h2 {
            font-size: 1.8rem;
            color: #212529;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
        }
        .gallery-header h2 i {
            color: #D4AF37;
        }
        .gallery-sub {
            color: #5A6B7C;
            margin-top: 6px;
            font-size: 0.9rem;
        }
        .carousel-container {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-wrapper {
            overflow: hidden;
            width: calc(3 * 280px + 2 * 20px);
            max-width: 100%;
            margin: 0 15px;
        }
        .carousel-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s ease;
        }
        .carousel-item {
            flex: 0 0 280px;
            cursor: pointer;
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid #E9EEF3;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .carousel-item:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
            border-color: #D4AF37;
        }
        .carousel-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .carousel-btn {
            background: #D4AF37;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }
        .carousel-btn:hover {
            background: #C5A028;
            transform: scale(1.05);
        }
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .lightbox.active {
            display: flex;
        }
        .lightbox img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 12px;
            border: 2px solid #D4AF37;
        }
        .lightbox .close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }
        .lightbox .close:hover { color: #D4AF37; }
        .lightbox .prev, .lightbox .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 50px;
            color: white;
            background: rgba(0,0,0,0.5);
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 50%;
        }
        .lightbox .prev { left: 20px; }
        .lightbox .next { right: 20px; }
        .lightbox .prev:hover, .lightbox .next:hover { background: rgba(0,0,0,0.8); color: #D4AF37; }
        /* ========== CONTACT ========== */
        .contact-map {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .info-card {
            background: #FFFFFF;
            border-radius: 28px;
            padding: 30px;
            border: 1px solid #EDF2F7;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 24px;
        }
        .info-icon {
            width: 48px;
            height: 48px;
            background: #F5F7FA;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #D4AF37;
            border: 1px solid #E9EEF3;
            flex-shrink: 0;
        }
        .info-text h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #212529;
        }
        .info-text p, .info-text a {
            color: #5A6B7C;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .info-text a:hover {
            color: #D4AF37;
        }
        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }
        .social-icons a {
            background: #F5F7FA;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: 0.2s;
            color: #D4AF37;
            text-decoration: none;
            border: 1px solid #E9EEF3;
        }
        .social-icons a:hover {
            background: #D4AF37;
            color: #FFFFFF;
        }
        .map-container {
            border-radius: 28px;
            overflow: hidden;
            border: 2px solid #E9EEF3;
            height: 100%;
            min-height: 350px;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: 0;
            min-height: 350px;
        }
        footer {
            background: #F5F7FA;
            color: #5A6B7C;
            text-align: center;
            padding: 30px;
            border-top: 1px solid #E9EEF3;
            font-size: 0.85rem;
        }
        /* ========== SECTION DÉCOUVREZ NOTRE CLINIQUE ========== */
        .clinic-showcase {
            background: #FFFFFF;
            padding: 50px 20px;
        }
        .showcase-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .showcase-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #212529;
            margin-bottom: 10px;
        }
        .showcase-header h2 i {
            color: #D4AF37;
            margin-right: 10px;
        }
        .showcase-header p {
            color: #5A6B7C;
            font-size: 1rem;
        }
        .showcase-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .showcase-item {
            cursor: pointer;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            background: #F8F9FA;
        }
        .showcase-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .showcase-item img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s;
        }
        .showcase-item:hover img {
            transform: scale(1.02);
        }
        .showcase-caption {
            padding: 12px;
            text-align: center;
            font-weight: 500;
            color: #212529;
            background: #FFFFFF;
        }
        /* Lightbox pour les photos clinique */
        .clinic-lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .clinic-lightbox.active {
            display: flex;
        }
        .clinic-lightbox-img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 12px;
            border: 2px solid #D4AF37;
        }
        .clinic-lightbox .clinic-close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }
        .clinic-lightbox .clinic-close:hover { color: #D4AF37; }
        .clinic-lightbox .clinic-prev,
        .clinic-lightbox .clinic-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 50px;
            color: white;
            background: rgba(0,0,0,0.5);
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 50%;
            user-select: none;
        }
        .clinic-lightbox .clinic-prev { left: 20px; }
        .clinic-lightbox .clinic-next { right: 20px; }
        .clinic-lightbox .clinic-prev:hover,
        .clinic-lightbox .clinic-next:hover {
            background: rgba(0,0,0,0.8);
            color: #D4AF37;
        }
        @media (max-width: 800px) {
            .showcase-item img { height: 200px; }
            .clinic-lightbox .clinic-prev,
            .clinic-lightbox .clinic-next { font-size: 30px; padding: 5px 12px; }
            .clinic-lightbox .clinic-close { font-size: 30px; right: 20px; }
            .contact-map { grid-template-columns: 1fr; }
            .hero-overlay { padding: 0 8%; }
            .hero-overlay h1 { font-size: 2.2rem; }
            .hero-overlay p { font-size: 1rem; }
            .navbar .container { flex-direction: column; gap: 15px; }
            .carousel-btn { width: 32px; height: 32px; font-size: 20px; }
            .carousel-wrapper { width: calc(2 * 220px + 20px); }
            .carousel-item { flex: 0 0 220px; }
            .carousel-item img { height: 160px; }
            .services-grid { gap: 20px; }
            .service-card { padding: 16px; }
            .service-icon-small { font-size: 1.5rem; width: 36px; }
            .service-card h3 { font-size: 1.1rem; }
            .about-container { flex-direction: column; gap: 30px; text-align: center; }
            .about-text p:first-of-type::first-letter { float: none; font-size: 2.5rem; display: inline-block; margin-right: 5px; }
        }
        @media (max-width: 550px) {
            .carousel-wrapper { width: calc(1 * 220px); }
            .carousel-item { flex: 0 0 220px; }
            .showcase-grid { gap: 20px; }
            .showcase-item img { height: 180px; }
        }
    </style>
</head>
<body>

<nav class="navbar" id="navbar">
    <div class="container">
        <a href="#" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Clinique Lebdiri">
            <span class="logo-text">Clinique Lebdiri</span>
        </a>
        <div class="nav-links">
            <a href="#">Accueil</a>
            <a href="#gallery">Galerie</a>
            <a href="#services">Soins</a>
            <a href="#contact">Contact</a>
            <a href="#" id="adminLoginBtn" style="cursor: pointer;">
                <i class="fas fa-lock"></i>
            </a>
        </div>
    </div>
</nav>

<div class="hero-video">
    <video autoplay loop muted playsinline>
        <source src="{{ asset('videos/vd.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay">
        <h1>Clinique Lebdiri</h1>
        <p>Soins dentaires d'urgence 24h/24 – Dar El Beïda<br>Accueil et qualité 7j/7 (sauf vendredi)</p>
        <a href="{{ route('rdv.create') }}" class="btn">📅 Prendre rendez-vous</a>
    </div>
</div>

<!-- Section Découvrez notre clinique (photos cliquables) -->
<div class="clinic-showcase">
    <div class="showcase-header">
        <h2><i class="fas fa-clinic-medical"></i> Découvrez notre clinique</h2>
        <p>Un cadre moderne, propre et accueillant pour vos soins dentaires</p>
    </div>
    <div class="showcase-grid" id="clinicGrid">
        <div class="showcase-item" data-index="0">
            <img src="{{ asset('images/lebdiri1.png') }}" alt="Salle d'attente">
            <div class="showcase-caption">Salle d'attente confortable</div>
        </div>
        <div class="showcase-item" data-index="1">
            <img src="{{ asset('images/lebdiri2.png') }}" alt="Salle de soins">
            <div class="showcase-caption">Équipement moderne</div>
        </div>
    </div>
</div>

<!-- Section À propos -->
<div class="about-section">
    <div class="about-container">
        <div class="about-text">
            <h2>À propos de notre clinique</h2>
            <p>
                Bienvenue à la Clinique Lebdiri, un espace dédié à votre santé dentaire.
                Nous vous accueillons dans un cadre moderne, chaleureux et entièrement équipé
                pour vous offrir des soins de qualité. Notre équipe est à votre écoute
                et met tout en œuvre pour que votre visite se déroule dans les meilleures conditions.
            </p>
            <p>
                Que ce soit pour une urgence, un contrôle de routine ou un traitement esthétique,
                nous vous proposons des prestations adaptées à chaque besoin. La propreté, la
                sécurité et votre confort sont nos priorités absolues.
            </p>
        </div>
        <div class="about-image">
            <img src="{{ asset('images/image.jpg') }}" alt="Intérieur de la clinique">
        </div>
    </div>
</div>

<!-- Galerie carrousel -->
<div id="gallery" class="gallery">
    <div class="gallery-header">
        <h2><i class="fas fa-camera-retro"></i> Notre cabinet en images</h2>
        <div class="gallery-sub">Découvrez notre espace dédié au bien‑être dentaire</div>
    </div>
    <div class="carousel-container">
        <button class="carousel-btn" id="prevBtn">‹</button>
        <div class="carousel-wrapper">
            <div class="carousel-track" id="carouselTrack"></div>
        </div>
        <button class="carousel-btn" id="nextBtn">›</button>
    </div>
</div>

<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    <img id="lightboxImg" src="" alt="">
</div>

<!-- Lightbox dédiée aux photos de la clinique -->
<div id="clinicLightbox" class="clinic-lightbox">
    <span class="clinic-close">&times;</span>
    <span class="clinic-prev">&#10094;</span>
    <span class="clinic-next">&#10095;</span>
    <img class="clinic-lightbox-img" src="" alt="">
</div>

<div id="services" class="services">
    <div class="services-header">
        <h2><i class="fas fa-teeth-open"></i> Nos soins dentaires</h2>
        <p>Des prestations complètes pour votre santé bucco‑dentaire</p>
    </div>
    <div class="services-grid">
        <div class="service-card">
            <div class="service-header">
                <div class="service-icon-small"><i class="fas fa-braces"></i></div>
                <h3>Orthodontie & Alignement</h3>
            </div>
            <p>Redressez votre sourire avec les dernières technologies.</p>
            <ul class="service-details">
                <li><i class="fas fa-check-circle"></i> Aligneurs invisibles</li>
                <li><i class="fas fa-check-circle"></i> Bagues autoligaturantes</li>
                <li><i class="fas fa-check-circle"></i> Orthodontie pédiatrique</li>
            </ul>
        </div>
        <div class="service-card">
            <div class="service-header">
                <div class="service-icon-small"><i class="fas fa-smile-wink"></i></div>
                <h3>Esthétique dentaire</h3>
            </div>
            <p>Révélez un sourire éclatant et harmonieux.</p>
            <ul class="service-details">
                <li><i class="fas fa-check-circle"></i> Facettes en céramique</li>
                <li><i class="fas fa-check-circle"></i> Blanchiment professionnel</li>
                <li><i class="fas fa-check-circle"></i> Facettes composite</li>
            </ul>
        </div>
        <div class="service-card">
            <div class="service-header">
                <div class="service-icon-small"><i class="fas fa-syringe"></i></div>
                <h3>Chirurgie & Implantologie</h3>
            </div>
            <p>Solutions durables pour remplacer vos dents.</p>
            <ul class="service-details">
                <li><i class="fas fa-check-circle"></i> Pose d’implants</li>
                <li><i class="fas fa-check-circle"></i> Greffes osseuses</li>
                <li><i class="fas fa-check-circle"></i> Extractions des dents de sagesse</li>
            </ul>
        </div>
        <div class="service-card">
            <div class="service-header">
                <div class="service-icon-small"><i class="fas fa-tooth"></i></div>
                <h3>Soins généraux & Urgences</h3>
            </div>
            <p>Prévention et traitements quotidiens, 24h/24.</p>
            <ul class="service-details">
                <li><i class="fas fa-check-circle"></i> Détartrage complet</li>
                <li><i class="fas fa-check-circle"></i> Soins des caries</li>
                <li><i class="fas fa-check-circle"></i> Endodontie (traitement canalaire)</li>
            </ul>
        </div>
    </div>
</div>

<div id="contact" class="container">
    <div class="contact-map">
        <div class="info-card">
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="info-text">
                    <h3>Adresse</h3>
                    <p>La base équipée, Cité la Base, Dar El Beïda, Alger</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="info-text">
                    <h3>Téléphone</h3>
                    <a href="tel:+213776109504">+213 776 10 95 04</a>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-clock"></i></div>
                <div class="info-text">
                    <h3>Horaires</h3>
                    <p>Samedi – Jeudi : 24h/24<br>Vendredi : <span style="color:#D4AF37;">Fermé</span></p>
                </div>
            </div>
            <div class="info-item">
    <div class="info-icon"><i class="fab fa-facebook-f"></i></div>
    <div class="info-text">
        <h3>Page Facebook</h3>
        <a href="https://www.facebook.com/lebdiridental" target="_blank">@lebdiridental</a>
    </div>
</div>
        </div>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d831.2!2d3.2144355!3d36.7108327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e516a69dd4e13%3A0xf57daa9d9b2478c1!2sClinique%20Dentaire%20Lebdiri%20-%20Dentiste%20Dar%20El%20Beida!5e0!3m2!1sfr!2sdz!4v1717000000000!5m2!1sfr!2sdz"
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

<!-- Modal Connexion Admin -->
<div id="adminModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: white; border-radius: 20px; max-width: 320px; width: 90%; padding: 24px; box-shadow: 0 20px 30px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3 style="color: #1e3a8a; margin: 0; font-size: 1.2rem; font-weight: 600;">Accès admin</h3>
            <span id="closeAdminModal" style="cursor: pointer; font-size: 22px; color: #666;">&times;</span>
        </div>
        <form id="adminLoginForm">
            @csrf
            <input type="email" id="adminEmail" placeholder="Email" required style="width:100%; padding:10px; margin:10px 0; border-radius:12px; border:1px solid #ccc; font-size:0.9rem;">
            <input type="password" id="adminPassword" placeholder="Mot de passe" required style="width:100%; padding:10px; margin:10px 0; border-radius:12px; border:1px solid #ccc; font-size:0.9rem;">
            <div id="adminLoginError" style="color:#c00; margin:10px 0; font-size:0.8rem; display:none;"></div>
            <button type="submit" style="background: #1e3a8a; color: white; border: none; padding:10px; border-radius:30px; width:100%; font-weight:600; font-size:0.9rem; cursor: pointer; transition:0.2s;">Se connecter</button>
        </form>
    </div>
</div>

<footer>
    <p>© Clinique Lebdiri – Tous droits réservés</p>
</footer>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Galerie principale (carrousel)
    const imageFiles = ['img1.png','img2.png','img3.png','img4.png','img5.png','img6.png','img7.png', 'img8.png','img9.png','img10.png'];
    const track = document.getElementById('carouselTrack');
    let itemsPerView = 3, currentIndex = 0;

    imageFiles.forEach((file, idx) => {
        const div = document.createElement('div');
        div.className = 'carousel-item';
        const img = document.createElement('img');
        img.src = `{{ asset('images') }}/${file}`;
        div.appendChild(img);
        div.addEventListener('click', () => openLightbox(idx));
        track.appendChild(div);
    });

    function updateItemsPerView() {
        const w = window.innerWidth;
        itemsPerView = w <= 650 ? 1 : w <= 950 ? 2 : 3;
        currentIndex = Math.min(currentIndex, imageFiles.length - itemsPerView);
        if (currentIndex < 0) currentIndex = 0;
        updateCarousel();
    }

    function updateCarousel() {
        const w = document.querySelector('.carousel-item')?.offsetWidth || 280;
        const shift = currentIndex * (w + 20);
        track.style.transform = `translateX(-${shift}px)`;
    }

    document.getElementById('prevBtn').addEventListener('click', () => { currentIndex = Math.max(0, currentIndex - 1); updateCarousel(); });
    document.getElementById('nextBtn').addEventListener('click', () => { currentIndex = Math.min(imageFiles.length - itemsPerView, currentIndex + 1); updateCarousel(); });
    window.addEventListener('resize', () => { updateItemsPerView(); updateCarousel(); });
    updateItemsPerView();

    // Lightbox galerie principale
    const lightbox = document.getElementById('lightbox'), lightboxImg = document.getElementById('lightboxImg');
    let currentLightboxIndex = 0;

    function openLightbox(i) { currentLightboxIndex = i; lightboxImg.src = `{{ asset('images') }}/${imageFiles[i]}`; lightbox.classList.add('active'); }
    function closeLightbox() { lightbox.classList.remove('active'); }
    document.querySelector('.lightbox .close').addEventListener('click', closeLightbox);
    document.querySelector('.lightbox .prev').addEventListener('click', () => { currentLightboxIndex = (currentLightboxIndex - 1 + imageFiles.length) % imageFiles.length; lightboxImg.src = `{{ asset('images') }}/${imageFiles[currentLightboxIndex]}`; });
    document.querySelector('.lightbox .next').addEventListener('click', () => { currentLightboxIndex = (currentLightboxIndex + 1) % imageFiles.length; lightboxImg.src = `{{ asset('images') }}/${imageFiles[currentLightboxIndex]}`; });
    lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', e => { if (!lightbox.classList.contains('active')) return; if (e.key === 'ArrowLeft') document.querySelector('.lightbox .prev').click(); if (e.key === 'ArrowRight') document.querySelector('.lightbox .next').click(); if (e.key === 'Escape') closeLightbox(); });

    // Admin modal
    const adminBtn = document.getElementById('adminLoginBtn'), adminModal = document.getElementById('adminModal'), closeAdmin = document.getElementById('closeAdminModal');
    adminBtn.onclick = () => adminModal.style.display = 'flex';
    closeAdmin.onclick = () => adminModal.style.display = 'none';
    window.onclick = e => { if (e.target === adminModal) adminModal.style.display = 'none'; };
    document.getElementById('adminLoginForm').addEventListener('submit', async e => {
        e.preventDefault();
        const email = document.getElementById('adminEmail').value, password = document.getElementById('adminPassword').value, errorDiv = document.getElementById('adminLoginError');
        try {
            const res = await fetch('/admin/login', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value }, body: JSON.stringify({ email, password }) });
            const data = await res.json();
            if (data.success) window.location.href = '/admin/appointments';
            else { errorDiv.textContent = data.message || 'Identifiants incorrects'; errorDiv.style.display = 'block'; }
        } catch (err) { errorDiv.textContent = 'Erreur réseau'; errorDiv.style.display = 'block'; }
    });

    // Lightbox pour les photos de la clinique (lebdiri1, lebdiri2)
    const clinicItems = document.querySelectorAll('#clinicGrid .showcase-item');
    const clinicLightbox = document.getElementById('clinicLightbox');
    const clinicLightboxImg = document.querySelector('.clinic-lightbox-img');
    const clinicClose = document.querySelector('.clinic-lightbox .clinic-close');
    const clinicPrev = document.querySelector('.clinic-lightbox .clinic-prev');
    const clinicNext = document.querySelector('.clinic-lightbox .clinic-next');

    if (clinicItems.length) {
        let currentClinicIndex = 0;
        const clinicImages = Array.from(clinicItems).map(item => item.querySelector('img').src);

        function openClinicLightbox(index) {
            currentClinicIndex = index;
            clinicLightboxImg.src = clinicImages[currentClinicIndex];
            clinicLightbox.classList.add('active');
        }
        function closeClinicLightbox() {
            clinicLightbox.classList.remove('active');
        }
        function showPrevClinic() {
            currentClinicIndex = (currentClinicIndex - 1 + clinicImages.length) % clinicImages.length;
            clinicLightboxImg.src = clinicImages[currentClinicIndex];
        }
        function showNextClinic() {
            currentClinicIndex = (currentClinicIndex + 1) % clinicImages.length;
            clinicLightboxImg.src = clinicImages[currentClinicIndex];
        }

        clinicItems.forEach((item, idx) => {
            item.addEventListener('click', () => openClinicLightbox(idx));
        });
        clinicClose.addEventListener('click', closeClinicLightbox);
        clinicPrev.addEventListener('click', showPrevClinic);
        clinicNext.addEventListener('click', showNextClinic);
        clinicLightbox.addEventListener('click', (e) => {
            if (e.target === clinicLightbox) closeClinicLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (!clinicLightbox.classList.contains('active')) return;
            if (e.key === 'ArrowLeft') showPrevClinic();
            if (e.key === 'ArrowRight') showNextClinic();
            if (e.key === 'Escape') closeClinicLightbox();
        });
    }
</script>
</body>
</html>