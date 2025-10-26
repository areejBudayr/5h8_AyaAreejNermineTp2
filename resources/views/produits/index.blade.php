@extends('layouts.app')
@section('title','Produits')
@section('header','Produits')

@section('content')
<div class="container mt-4">

    {{-- HERO / TITRE CENTRÉ --}}
<div class="page-hero">
  <h1>Produits</h1>
</div>

{{-- FILTRES RÉORGANISÉS --}}
<form method="GET" class="filters-v3">
  <div class="top-row">
    <div class="search-box">
      <input type="text" name="search"
             value="{{ request('search') }}"
             placeholder="Rechercher un nom…">
    </div>
    <div class="category-box">
      <select name="category_id">
        <option value="">Toutes les catégories</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>
            {{ $c->nom }}
          </option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="actions">
    <a href="{{ route('produits.index') }}" class="btn btn-ghost">Réinitialiser</a>
    <button class="btn btn-primary">Filtrer</button>
  </div>
</form>

     {{-- messages flash / erreurs --}}
    @if(session('ok'))
        <div class="alert alert-success">{{ session('ok') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="m-0 ps-3">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- tableau --}}
<div class="table-responsive table-card">
  <table class="table table-bordered align-middle" style="margin:0">
    <thead class="table-light">
      <tr>
        <th style="width:72px">Image</th>
        <th style="width:80px">#</th>
        <th>Nom</th>
        <th style="width:140px">Prix</th>
        <th style="width:100px">Qté</th>
        <th style="width:220px"></th>
      </tr>
    </thead>
    <tbody>
      @forelse($produits as $p)
        <tr>
          {{-- Image --}}
          <td>
            <img
              src="{{ $p->image_url ? asset('images/'.$p->image_url) : asset('images/placeholder.png') }}"
              alt="{{ $p->nom }}"
              style="height:90px;width:auto;object-fit:contain;border-radius:8px;margin-right:8px;display:block;margin:auto;">          </td>

          {{-- ID --}}
          <td>{{ $p->id }}</td>

          {{-- Nom (+ catégorie en petit) --}}
          <td>
  <a href="{{ route('produits.show',$p) }}">{{ $p->nom }}</a>
  @if($p->categorieRef)
    <div class="text-muted small">{{ $p->categorieRef->nom }}</div>
  @endif
</td>

          {{-- Prix --}}
          <td>{{ number_format($p->prix, 2, ',', ' ') }} $</td>

          {{-- Quantité --}}
          <td>{{ $p->quantite }}</td>

          {{-- Actions --}}
          <td class="text-nowrap">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('produits.show',$p) }}">Voir</a>
            <a class="btn btn-sm btn-warning" href="{{ route('produits.edit',$p) }}">Modifier</a>
            <form class="d-inline" method="POST" action="{{ route('produits.destroy',$p) }}">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"
                      onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-muted">Aucun produit.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>


    {{-- pagination (conserve les filtres) --}}
    <div class="mt-3">
        {{ $produits->withQueryString()->links() }}
    </div>
</div>
@endsection
