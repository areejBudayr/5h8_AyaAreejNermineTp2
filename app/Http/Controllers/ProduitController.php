<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
{
    $q = Produit::orderBy('created_at','desc');

    // (facultatif mais utile) petits filtres si la prof accepte
    if (request('search'))  $q->where('nom','like','%'.request('search').'%');
    if (request('categorie')) $q->where('categorie', request('categorie'));
    if (request('taille'))  $q->where('taille', request('taille'));
    if (request('sexe'))    $q->where('sexe', request('sexe'));

    $produits = $q->paginate(10)->appends(request()->query());
    return view('produits.index', compact('produits'));
}

public function store(\Illuminate\Http\Request $r)
{
    $data = $r->validate([
        'nom'        => 'required|string|max:255',
        'description'=> 'nullable|string',
        'prix'       => 'required|numeric|min:0',
        'quantite'   => 'required|integer|min:0',

        'categorie'  => 'required|string|max:50',
        'marque'     => 'nullable|string|max:50',
        'taille'     => 'nullable|string|max:10',
        'couleur'    => 'nullable|string|max:30',
        'sexe'       => 'required|string|max:10',
        'image_url'  => 'nullable|url',
    ]);

    Produit::create($data);
    return redirect()->route('produits.index')->with('ok','Produit ajouté.');
}

public function update(\Illuminate\Http\Request $r, Produit $produit)
{
    $data = $r->validate([
        'nom'        => 'required|string|max:255',
        'description'=> 'nullable|string',
        'prix'       => 'required|numeric|min:0',
        'quantite'   => 'required|integer|min:0',

        'categorie'  => 'required|string|max:50',
        'marque'     => 'nullable|string|max:50',
        'taille'     => 'nullable|string|max:10',
        'couleur'    => 'nullable|string|max:30',
        'sexe'       => 'required|string|max:10',
        'image_url'  => 'nullable|url',
    ]);

    $produit->update($data);
    return redirect()->route('produits.index')->with('ok','Produit modifié.');
}


    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('ok','Produit supprimé.');
    }
}
