<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Catalogue')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Feuille de style du thème boutique (rose/noir/gris) --}}
  <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
</head>
<body>

  {{-- HEADER --}}
  <header class="site-header">
    <div class="container navbar">
      <a href="{{ url('/') }}" class="brand" aria-label="Accueil">
        {{-- Remplace plus tard par ton image de logo :
             <img src="{{ asset('images/logo.png') }}" alt="NAAR" class="logo" style="width:36px;height:36px;border-radius:10px"> --}}
        <span class="logo"></span>
        <span class="title">NAAR Boutique</span>
      </a>

      <nav class="nav">
        <a href="{{ route('produits.index') }}" class="{{ request()->is('produits*') ? 'active' : '' }}">Produits</a>
        <!-- <a href="#" title="Collections à venir">Collections</a> -->
        <a href="#" title="À propos">À propos</a>

        <a href="{{ route('produits.create') }}" class="btn primary">+ Nouveau</a>
        <a href="#" class="btn outline">Connexion</a>
      </nav>
    </div>
  </header>

  {{-- CONTENU PRINCIPAL --}}
  <main class="container">
    @if(session('ok'))
      <div class="badge" style="margin:10px 0">{{ session('ok') }}</div>
    @endif

    @yield('content')

    {{-- Styles minimalistes pour la pagination Laravel par défaut --}}
    <style>
      nav[role="navigation"] svg { width:16px; height:16px; vertical-align:middle; }
      nav[role="navigation"] .hidden { display:none; }
      
    </style>
  </main>

</body>
</html>
