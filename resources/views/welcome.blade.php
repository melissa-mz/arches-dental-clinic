<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Arches Dental Clinic – Dr Sahraoui</title>
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
            background: #F2EDE8;
            color: #3D3A36;
            line-height: 1.5;
            padding-top: 76px;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 252, 249, 0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid #E8DDD0;
            z-index: 100;
            padding: 12px 0;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        .navbar.scrolled {
            background: rgba(255, 252, 249, 0.98);
            backdrop-filter: blur(16px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
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
            /* Le logo reste à gauche naturellement avec flex-start */
        }
        .logo img {
            height: 50px;
            width: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #D4AF37;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            font-style: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .logo-text .arches {
            color: #0033cc;
        }
        .logo-text .dental {
            color: #1a1a1a;
        }
        .logo-text .clinic {
            color: #1a1a1a;
        }
        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
            /* Les liens sont poussés à droite par justify-content: space-between */
        }
        .nav-links a {
            text-decoration: none;
            color: #3D3A36;
            font-weight: 500;
            font-size: 1.2rem;
            transition: color 0.2s ease;
            position: relative;
            padding: 5px 0;
        }
        /* Soulignement bleu au survol */
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: #0033cc;
            transition: width 0.3s ease;
        }
        .nav-links a:hover::after {
            width: 100%;
        }
        .nav-links a:hover {
            color: #0033cc;
        }
        .hero-video {
            position: relative;
            width: 100%;
            height: 85vh;
            overflow: hidden;
            border-radius: 0 0 40px 40px;
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
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            text-align: left;
            padding: 0 5% 0 12%;
        }
        .hero-overlay h1 {
            font-size: 4.5rem;
            font-weight: 900;
            font-family: 'Playfair Display', serif;
            font-style: normal;
            line-height: 1.15;
            max-width: 75%;
            color: #ffffff;
            text-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        .hero-overlay p {
            font-size: 1.3rem;
            max-width: 45%;
            margin-top: 1rem;
            margin-bottom: 0;
            color: #ffffff;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            line-height: 1.6;
            font-weight: 300;
            text-align: left;
        }

        /* ========== SECTIONS AVEC PADDING RÉDUIT ========== */
        .section-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .clinic-showcase {
            background: #E8DDD0;
            border-radius: 32px;
            padding: 30px 30px;
            border: 1px solid #D4C8B8;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }
        .about-section {
            background: #E8DDD0;
            border-radius: 32px;
            padding: 30px 30px;
            border: 1px solid #D4C8B8;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }
        .services {
            background: #E8DDD0;
            border-radius: 32px;
            padding: 30px 30px;
            border: 1px solid #D4C8B8;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }
        .gallery {
            background: #E8DDD0;
            border-radius: 32px;
            padding: 30px 30px;
            border: 1px solid #D4C8B8;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }
        .contact-map {
            background: #E8DDD0;
            border-radius: 32px;
            padding: 30px 30px;
            border: 1px solid #D4C8B8;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
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
            color: #3D3A36;
            margin-bottom: 20px;
        }
        .about-text p {
            color: #4A4540;
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
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.06);
        }
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s;
        }

        .services-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .services-header h2 {
            font-size: 2rem;
            color: #3D3A36;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: 'Playfair Display', serif;
        }
        .services-header h2 i {
            color: #D4AF37;
        }
        .services-header p {
            color: #4A4540;
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
            background: #F5F0EA;
            border-radius: 24px;
            padding: 20px;
            text-align: left;
            transition: all 0.25s ease;
            border: 1px solid #D4C8B8;
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
            color: #3D3A36;
        }
        .service-card p {
            color: #4A4540;
            line-height: 1.5;
            font-size: 0.85rem;
            margin-bottom: 12px;
        }
        .service-details {
            list-style: none;
            padding-left: 0;
            margin-top: 8px;
            border-top: 1px solid #D4C8B8;
            padding-top: 10px;
        }
        .service-details li {
            font-size: 0.8rem;
            color: #4A4540;
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

        .gallery-header {
            text-align: center;
            margin-bottom: 25px;
        }
        .gallery-header h2 {
            font-size: 1.8rem;
            color: #3D3A36;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
        }
        .gallery-header h2 i {
            color: #D4AF37;
        }
        .gallery-sub {
            color: #4A4540;
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
            border: 2px solid #D4C8B8;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .carousel-item:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.06);
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
            background: #B8962A;
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

        .info-card {
            background: #F5F0EA;
            border-radius: 28px;
            padding: 30px;
            border: 1px solid #D4C8B8;
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
            background: #E8DDD0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #D4AF37;
            border: 1px solid #D4C8B8;
            flex-shrink: 0;
        }
        .info-text h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #3D3A36;
        }
        .info-text a {
            color: #4A4540;
            text-decoration: none;
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
            background: #E8DDD0;
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
            border: 1px solid #D4C8B8;
        }
        .social-icons a:hover {
            background: #D4AF37;
            color: #FFFFFF;
        }
        .map-container {
            border-radius: 28px;
            overflow: hidden;
            border: 2px solid #D4C8B8;
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
            background: #F2EDE8;
            color: #5A554F;
            text-align: center;
            padding: 30px;
            border-top: 1px solid #E8DDD0;
            font-size: 0.85rem;
        }
        .showcase-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .showcase-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #3D3A36;
            margin-bottom: 10px;
        }
        .showcase-header h2 i {
            color: #D4AF37;
            margin-right: 10px;
        }
        .showcase-header p {
            color: #4A4540;
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
            box-shadow: 0 10px 20px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
            background: #F5F0EA;
            border: 1px solid #D4C8B8;
        }
        .showcase-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
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
            color: #3D3A36;
            background: #F5F0EA;
        }
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
        }
        .clinic-lightbox .clinic-prev { left: 20px; }
        .clinic-lightbox .clinic-next { right: 20px; }
        .clinic-lightbox .clinic-prev:hover,
        .clinic-lightbox .clinic-next:hover {
            background: rgba(0,0,0,0.8);
            color: #D4AF37;
        }
        @media (max-width: 800px) {
            .clinic-showcase { padding: 20px 16px; }
            .about-section { padding: 20px 16px; }
            .services { padding: 20px 16px; }
            .gallery { padding: 20px 16px; }
            .contact-map { padding: 20px 16px; grid-template-columns: 1fr; }
            .hero-overlay { padding: 0 5% 0 8%; }
            .hero-overlay h1 { font-size: 2.8rem; max-width: 90%; }
            .hero-overlay p { font-size: 1rem; max-width: 70%; }
            .navbar .container { 
                flex-direction: column; 
                gap: 15px;
                align-items: flex-start; /* Aligne tout à gauche sur mobile */
            }
            .nav-links { 
                width: 100%;
                justify-content: flex-start; /* Liens à gauche sur mobile */
                gap: 20px;
                flex-wrap: wrap;
            }
            .nav-links a { font-size: 1.05rem; }
            .logo-text { font-size: 1.2rem; }
            .carousel-wrapper { width: calc(2 * 220px + 20px); }
            .carousel-item { flex: 0 0 220px; }
            .carousel-item img { height: 160px; }
            .services-grid { gap: 20px; }
            .service-card { padding: 16px; }
            .about-container { flex-direction: column; gap: 30px; text-align: center; }
            .about-text p:first-of-type::first-letter { float: none; font-size: 2.5rem; display: inline-block; margin-right: 5px; }
            .showcase-item img { height: 200px; }
        }
        @media (max-width: 550px) {
            .carousel-wrapper { width: calc(1 * 220px); }
            .carousel-item { flex: 0 0 220px; }
            .showcase-grid { gap: 20px; }
            .showcase-item img { height: 180px; }
            .hero-overlay h1 { font-size: 2.2rem; }
            .hero-overlay p { font-size: 0.9rem; max-width: 85%; }
            .nav-links a { font-size: 0.95rem; }
            .nav-links { gap: 15px; }
            .logo-text { font-size: 1rem; }
        }
    </style>
</head>
<body>

<nav class="navbar" id="navbar">
    <div class="container">
        <a href="#" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Arches Dental Clinic">
            <span class="logo-text">
                <span class="arches">ARCHES</span>
                <span class="dental">DENTAL</span>
                <span class="clinic">CLINIC</span>
            </span>
        </a>
        <div class="nav-links">
            <a href="#">Accueil</a>
            <a href="#gallery">Galerie</a>
            <a href="#services">Soins</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
</nav>

<div class="hero-video">
    <video autoplay loop muted playsinline>
        <source src="{{ asset('videos/vd.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay">
        <h1>Arches Dental Clinic<br>Dr Sahraoui</h1>
        <p>Soins dentaires d'excellence à Bouzareah</p>
    </div>
</div>

<!-- Section Découvrez notre clinique -->
<div class="section-wrapper">
    <div class="clinic-showcase">
        <div class="showcase-header">
            <h2><i class="fas fa-clinic-medical"></i> Découvrez notre clinique</h2>
            <p>Un cadre moderne, propre et accueillant pour vos soins dentaires</p>
        </div>
        <div class="showcase-grid" id="clinicGrid">
            <div class="showcase-item" data-index="0">
                <img src="{{ asset('images/attente.jpg') }}" alt="Salle d'attente">
                <div class="showcase-caption">Salle d'attente confortable</div>
            </div>
            <div class="showcase-item" data-index="1">
                <img src="{{ asset('images/equipement.jpg') }}" alt="Salle de soins">
                <div class="showcase-caption">Équipement moderne</div>
            </div>
        </div>
    </div>
</div>

<!-- Section À propos -->
<div class="section-wrapper">
    <div class="about-section">
        <div class="about-container">
            <div class="about-text">
                <h2>À propos de notre clinique</h2>
                <p>
                    Bienvenue à Arches Dental Clinic, un espace dédié à votre santé dentaire.
                    Sous la direction du Dr Sahraoui, nous vous accueillons dans un cadre moderne, chaleureux et entièrement équipé
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
                <img src="{{ asset('images/acceuil.jpg') }}" alt="Intérieur de la clinique">
            </div>
        </div>
    </div>
</div>

<!-- Galerie carrousel -->
<div class="section-wrapper">
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
</div>

<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    <img id="lightboxImg" src="" alt="">
</div>

<!-- Lightbox pour les photos de la clinique -->
<div id="clinicLightbox" class="clinic-lightbox">
    <span class="clinic-close">&times;</span>
    <span class="clinic-prev">&#10094;</span>
    <span class="clinic-next">&#10095;</span>
    <img class="clinic-lightbox-img" src="" alt="">
</div>

<div class="section-wrapper">
    <div id="services" class="services">
        <div class="services-header">
            <h2><i class="fas fa-teeth-open"></i> Nos soins dentaires</h2>
            <p>Des prestations complètes pour votre santé bucco‑dentaire</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-header"><div class="service-icon-small"><i class="fas fa-braces"></i></div><h3>Orthodontie & Alignement</h3></div>
                <p>Redressez votre sourire avec les dernières technologies.</p>
                <ul class="service-details"><li><i class="fas fa-check-circle"></i> Aligneurs invisibles</li><li><i class="fas fa-check-circle"></i> Bagues autoligaturantes</li><li><i class="fas fa-check-circle"></i> Orthodontie pédiatrique</li></ul>
            </div>
            <div class="service-card">
                <div class="service-header"><div class="service-icon-small"><i class="fas fa-smile-wink"></i></div><h3>Esthétique dentaire</h3></div>
                <p>Révélez un sourire éclatant et harmonieux.</p>
                <ul class="service-details"><li><i class="fas fa-check-circle"></i> Facettes en céramique</li><li><i class="fas fa-check-circle"></i> Blanchiment professionnel</li><li><i class="fas fa-check-circle"></i> Facettes composite</li></ul>
            </div>
            <div class="service-card">
                <div class="service-header"><div class="service-icon-small"><i class="fas fa-syringe"></i></div><h3>Chirurgie & Implantologie</h3></div>
                <p>Solutions durables pour remplacer vos dents.</p>
                <ul class="service-details"><li><i class="fas fa-check-circle"></i> Pose d’implants</li><li><i class="fas fa-check-circle"></i> Greffes osseuses</li><li><i class="fas fa-check-circle"></i> Extractions des dents de sagesse</li></ul>
            </div>
            <div class="service-card">
                <div class="service-header"><div class="service-icon-small"><i class="fas fa-tooth"></i></div><h3>Soins généraux & Urgences</h3></div>
                <p>Prévention et traitements quotidiens.</p>
                <ul class="service-details"><li><i class="fas fa-check-circle"></i> Détartrage complet</li><li><i class="fas fa-check-circle"></i> Soins des caries</li><li><i class="fas fa-check-circle"></i> Endodontie (traitement canalaire)</li></ul>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<div class="section-wrapper">
    <div id="contact" class="contact-map">
        <div class="info-card">
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="info-text">
                    <h3>Adresse</h3>
                    <p>Bouzareah, Alger</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="info-text">
                    <h3>Téléphone / WhatsApp</h3>
                    <a href="tel:+213552817876">0552 81 78 76</a>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fas fa-clock"></i></div>
                <div class="info-text">
                    <h3>Horaires</h3>
                    <p>Lundi – Samedi : 09:00 – 21:00</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon"><i class="fab fa-instagram"></i></div>
                <div class="info-text">
                    <h3>Instagram</h3>
                    <a href="https://www.instagram.com/arches_dental_clinic/" target="_blank">@arches_dental_clinic</a>
                </div>
            </div>
        </div>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.123456789!2d3.0166178!3d36.789766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fb10030119ef1%3A0xe9169be3ca35015a!2sArches%20dental%20clinic%20dr%20sahraoui!5e0!3m2!1sfr!2sdz!4v1710000000000!5m2!1sfr!2sdz"
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

<footer>
    <p>© Arches Dental Clinic – Dr Sahraoui | Tous droits réservés</p>
</footer>

<script>
    // ========== NAVBAR SCROLL EFFECT ==========
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 20) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
    });

    // ========== GALERIE PRINCIPALE (carrousel) ==========
    const imageFiles = ['img1.png','img2.png','img3.png','img4.png','img5.png','img6.png','img7.png','img8.png','img9.png','img10.png'];
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

    // ========== LIGHTBOX POUR LES PHOTOS DE LA CLINIQUE ==========
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