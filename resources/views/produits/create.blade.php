@extends('layouts.app')
@section('title','Nouveau produit')
@section('header','Nouveau produit')

@section('content')
<form method="POST" 
        action="{{ route('produits.store') }}"
         enctype="multipart/form-data">
  @csrf
  <p>Nom<br><input name="nom" value="{{ old('nom') }}" required></p>
  <p>Description<br><textarea name="description">{{ old('description') }}</textarea></p>
  <p>Prix<br><input type="number" step="0.01" min="0" name="prix" value="{{ old('prix') }}" required></p>
  <p>Quantité<br><input type="number" min="0" name="quantite" value="{{ old('quantite') }}" required></p>
  <p>Catégorie<br>
<select name="category_id" id="category_id" class="form-select" style="max-width:420px">
  <option value="">— Aucune —</option>
  @foreach($categories as $c)
    <option value="{{ $c->id }}"
      {{ old('category_id') == $c->id ? 'selected' : '' }}>
      {{ $c->nom }}
    </option>
  @endforeach
</select>
</p>
  <p>Image (JPG/PNG/WEBP)<br>
    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
  </p>
  <p><button class="button primary" type="submit">Enregistrer</button></p>
</form>
@endsection
