<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return redirect()->route('produits.index');
});

Route::resource('produits', ProduitController::class);
Route::view('/about','about')->name('about');

Route::get('/categories/autocomplete', [ProduitController::class,'autocompleteCategories'])
     ->name('categories.autocomplete');

Route::get('/categories/{categorie}', [ProduitController::class,'showCategory'])
     ->name('categories.show');

Route::get('/lang/{locale}', function ($locale) {
    abort_unless(in_array($locale, ['fr','en','ar']), 404);
    session(['locale' => $locale]);
    return back();
})->name('lang.switch');