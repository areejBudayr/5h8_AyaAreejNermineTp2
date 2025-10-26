
@extends('layouts.app')
@section('title','Nouveau produit')
@section('header','Nouveau produit')

@section('content')
<div class="page-toolbar">
  <h2 class="title">Nouveau produit</h2>
</div>

<form method="POST" action="{{ route('produits.store') }}" enctype="multipart/form-data" class="form-card">
  @csrf

  <div class="form-grid">
    <div class="full">
      <label for="nom">Nom</label>
      <input id="nom" type="text" name="nom" value="{{ old('nom') }}" required>
    </div>

    <div class="full">
      <label for="description">Description</label>
      <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>

    <div>
      <label for="prix">Prix</label>
      <input id="prix" type="number" step="0.01" min="0" name="prix" value="{{ old('prix') }}" required>
    </div>

    <div>
      <label for="quantite">Quantité</label>
      <input id="quantite" type="number" min="0" name="quantite" value="{{ old('quantite') }}" required>
    </div>

    <select name="category_id" id="category_id" class="form-select" style="max-width:420px">
  <option value="">— Aucune —</option>
  @foreach($categories as $c)
    <option value="{{ $c->id }}"
      {{ old('category_id') == $c->id ? 'selected' : '' }}>
      {{ $c->nom }}
    </option>
  @endforeach
</select>

    <div class="full">
      <label for="image">Image (JPG/PNG/WEBP)</label>
      <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
    </div>
  </div>

  <div class="form-actions">
    <a href="{{ route('produits.index') }}" class="btn btn-ghost">Annuler</a>
    <button class="btn btn-primary" type="submit">Enregistrer</button>
  </div>
</form>
@endsection
