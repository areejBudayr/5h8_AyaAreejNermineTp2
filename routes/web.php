<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return redirect()->route('produits.index');
});

Route::resource('produits', ProduitController::class);

Route::get('/categories/autocomplete', [ProduitController::class,'autocompleteCategories'])
     ->name('categories.autocomplete');

Route::get('/categories/{categorie}', [ProduitController::class,'showCategory'])
     ->name('categories.show');