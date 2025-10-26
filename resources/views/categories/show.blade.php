@extends('layouts.app')
@section('title','Catégorie: '.$categorie->nom)
@section('header','Catégorie: '.$categorie->nom)

@section('content')
<div class="container mt-4">
  <p class="text-muted">{{ $produits->total() }} produit(s)</p>
  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th style="width:72px">Image</th><th>#</th><th>Nom</th><th>Prix</th><th>Qté</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produits as $p)
          <tr>
            <td>@if($p->image_url)<img src="{{ asset('images/'.$p->image_url) }}" style="height:48px;width:auto;object-fit:contain;border-radius:8px">@endif</td>
            <td>{{ $p->id }}</td>
            <td><a href="{{ route('produits.show',$p) }}">{{ $p->nom }}</a></td>
            <td>{{ number_format($p->prix,2,',',' ') }} $</td>
            <td>{{ $p->quantite }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $produits->withQueryString()->links() }}</div>
</div>
@endsection
