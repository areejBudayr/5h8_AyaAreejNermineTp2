<!doctype html>
<html lang="{{ app()->getLocale() }}"
      @if(app()->getLocale()==='ar') dir="rtl" class="rtl" @endif>
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
       
             
        <span class="logo"></span>
        <span class="title">{{ __('app.brand') }}</span>
      </a>

      <nav class="nav">
        <div class="lang-switch">
  <a href="{{ route('lang.switch','fr') }}" class="{{ app()->getLocale()=='fr' ? 'active' : '' }}">FR</a>
  <a href="{{ route('lang.switch','en') }}" class="{{ app()->getLocale()=='en' ? 'active' : '' }}">EN</a>
  <a href="{{ route('lang.switch','ar') }}" class="{{ app()->getLocale()=='ar' ? 'active' : '' }}">AR</a>
</div>
        <a href="{{ route('produits.index') }}" class="{{ request()->is('produits*') ? 'active' : '' }}">
  {{ __('app.products') }}
</a>
        <!-- <a href="#" title="Collections à venir">Collections</a> -->
        <!-- <a href="#" title="À propos">{{ __('app.about') }}</a> -->

        <a href="{{ route('produits.create') }}" class="btn primary">{{ __('app.new') }}</a>
       <a href="#" class="btn outline">{{ __('app.login') }}</a>
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
      rtl body { direction: rtl; }
.rtl .navbar { flex-direction: row-reverse; }
.rtl .nav a { margin-right: 16px; margin-left: 0; }
      
    </style>
  </main>

</body>
</html>
