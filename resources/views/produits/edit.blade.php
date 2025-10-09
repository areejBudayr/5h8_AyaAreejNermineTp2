@extends('layouts.app')
@section('title','Modifier produit')
@section('header','Modifier produit')

@section('content')
<form method="POST" action="{{ route('produits.update',$produit) }}">
  @csrf @method('PUT')
  <p>Nom<br><input name="nom" value="{{ old('nom',$produit->nom) }}" required></p>
  <p>Description<br><textarea name="description">{{ old('description',$produit->description) }}</textarea></p>
  <p>Prix<br><input type="number" step="0.01" min="0" name="prix" value="{{ old('prix',$produit->prix) }}" required></p>
  <p>Quantité<br><input type="number" min="0" name="quantite" value="{{ old('quantite',$produit->quantite) }}" required></p>
  <p><button class="button primary" type="submit">Mettre à jour</button></p>
</form>
@endsection
