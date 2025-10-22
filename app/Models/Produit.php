<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom','description','prix','quantite',
        'categorie','marque','taille','couleur','sexe','image_url',
    ];
}
