@extends('layouts.app')

@section('title', 'Détail produit')
@section('header', 'Détail produit')

@section('content')
<div class="container mt-4">
    <h2>Détail du produit</h2>
    <div class="card p-4 shadow-sm">

     {{-- Image si disponible --}}
    @if($produit->image_url)
      <p style="margin:0 0 12px">
        <img src="{{ asset('images/'.$produit->image_url) }}"
             alt="Image {{ $produit->nom }}"
             style="max-height:260px;border-radius:12px;display:block">
      </p>
    @endif
        <p><strong>Nom :</strong> {{ $produit->nom }}</p>
        <p><strong>Description :</strong> {{ $produit->description ?? '—' }}</p>
        <p><strong>Prix :</strong> {{ number_format($produit->prix, 2, ',', ' ') }} $</p>
        <p><strong>Quantité :</strong> {{ $produit->quantite }}</p>
    </div>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
</div>
@endsection
