<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClothingFieldsToProduitsTable extends Migration
{
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->string('categorie')->default('Vetement');   // T-shirt, Pantalon, Robe...
            $table->string('marque')->nullable();               // Nike, Zara, etc.
            $table->string('taille', 10)->nullable();           // XS,S,M,L,XL
            $table->string('couleur', 30)->nullable();          // Noir, Bleu, ...
            $table->string('image_url')->nullable();            // URL d’image (simple)
        });
    }

    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn(['categorie','marque','taille','couleur','sexe','image_url']);
        });
    }
}
