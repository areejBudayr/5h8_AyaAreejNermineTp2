@extends('layouts.app')
@section('title','Modifier produit')
@section('header','Modifier produit')

@section('content')
<form method="POST" action="{{ route('produits.update',$produit) }}"
enctype="multipart/form-data">
  @csrf @method('PUT')
  <p>Nom<br><input name="nom" value="{{ old('nom',$produit->nom) }}" required></p>
  <p>Description<br><textarea name="description">{{ old('description',$produit->description) }}</textarea></p>
  <p>Prix<br><input type="number" step="0.01" min="0" name="prix" value="{{ old('prix',$produit->prix) }}" required></p>
  <p>Quantité<br><input type="number" min="0" name="quantite" value="{{ old('quantite',$produit->quantite) }}" required></p>
<div class="mb-3">
  <label for="category_id" class="form-label">Catégorie</label>
  <select name="category_id" id="category_id" class="form-select" style="max-width:420px">
  <option value="">— Aucune —</option>
  @foreach($categories as $c)
    <option value="{{ $c->id }}"
      {{ old('category_id', $produit->category_id) == $c->id ? 'selected' : '' }}>
      {{ $c->nom }}
    </option>
  @endforeach
</select>
</div>
  <p>Image (JPG/PNG/WEBP)<br>
    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
  </p>

  <p><button class="button primary" type="submit">Mettre à jour</button></p>
</form>
@endsection
