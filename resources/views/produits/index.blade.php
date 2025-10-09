@extends('layouts.app')
@section('title','Produits')
@section('header','Produits')

@section('content')
<table>
  <thead><tr><th>#</th><th>Nom</th><th>Prix</th><th>Qté</th><th></th></tr></thead>
  <tbody>
  @forelse($produits as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="{{ route('produits.show',$p) }}">{{ $p->nom }}</a></td>
      <td>{{ number_format($p->prix,2,',',' ') }} $</td>
      <td>{{ $p->quantite }}</td>
      <td>
        <a class="button" href="{{ route('produits.edit',$p) }}">Modifier</a>
        <form class="inline" method="POST" action="{{ route('produits.destroy',$p) }}">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Supprimer ?')">Supprimer</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="5">Aucun produit.</td></tr>
  @endforelse
  </tbody>
</table>
<div style="margin-top:12px">{{ $produits->links() }}</div>
@endsection
