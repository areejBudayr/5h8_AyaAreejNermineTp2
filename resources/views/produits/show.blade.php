@extends('layouts.app')
@section('title','Détail produit')
@section('header','Détail produit')

@section('content')
<p><strong>Nom :</strong> {{ $produit->nom }}</p>
<p><strong>Description :</strong> {{ $produit->description ?? '—' }}</p>
<p><strong>Prix :</strong> {{ number_format($produit->prix,2,',',' ') }} $</p>
<p><strong>Quantité :</strong> {{ $produit->quantite }}</p>
<p><a class="button" href="{{ route('produits.index') }}">Retour</a></p>
@endsection
