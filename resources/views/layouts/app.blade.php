<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Catalogue')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:system-ui,Segoe UI,Roboto,Arial;margin:0}
    .container{max-width:980px;margin:28px auto;padding:0 16px}
    .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
    .flash{background:#e6ffed;border:1px solid #b7ebc6;padding:10px;border-radius:8px;margin-bottom:14px}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid #eee}
    a.button, button{display:inline-block;padding:8px 12px;border-radius:8px;border:1px solid #ddd;background:#f7f7f7;text-decoration:none}
    a.button.primary{background:#1a73e8;color:#fff;border-color:#1a73e8}
    form.inline{display:inline}
     nav[role="navigation"] svg { width:16px; height:16px; }
  nav[role="navigation"] .hidden { display:none; }
  </style>
</head>
<body>
  <div class="container">
    <div class="topbar">
      <h1>@yield('header','Produits')</h1>
      <nav>
        <a class="button" href="{{ route('produits.index') }}">Liste</a>
        <a class="button primary" href="{{ route('produits.create') }}">Nouveau</a>
      </nav>
    </div>

    @if(session('ok'))
      <div class="flash">{{ session('ok') }}</div>
    @endif

    @yield('content')
  </div>
</body>
</html>
