@extends('layouts.app')
@section('title','Produits')
@section('header','Produits')

@section('content')
<div class="container mt-4">

    {{-- barre d’actions --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Produits</h2>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">+ Ajouter</a>
    </div>

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

    {{-- filtres simples --}}
    <form method="GET" class="row g-2 mb-3">
        <div class="col-sm-6 col-md-4">
            <input name="search" value="{{ request('search') }}" class="form-control" placeholder="Rechercher un nom…">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary">Filtrer</button>
            <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
        </div>
        <div class="col-sm-6 col-md-3">
  <select name="category_id" class="form-select" onchange="this.form.submit()">
    <option value="">Toutes les catégories</option>
    @foreach($categories as $c)
      <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>
        {{ $c->nom }}
      </option>
    @endforeach
  </select>
</div>
    </form>

    {{-- tableau --}}
<div class="table-responsive">
  <table class="table table-bordered align-middle">
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
