<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClothingFieldsToProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->string('categorie')->default('Vetement');
            $table->string('marque')->nullable();
            $table->string('taille', 10)->nullable();
            $table->string('couleur', 30)->nullable();
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn(['categorie', 'marque', 'taille', 'couleur', 'image_url']);
        });
    }
}
