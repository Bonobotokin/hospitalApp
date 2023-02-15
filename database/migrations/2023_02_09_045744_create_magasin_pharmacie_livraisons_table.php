<?php

use App\Models\CommandeProduit;
use App\Models\Produit;
use App\Models\Magasinier;
use App\Models\Pharmacien;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magasin_pharmacie_livraisons', function (Blueprint $table) {
            $table->id();
            $table->integer('num_livraison');
            $table->foreignIdFor(CommandeProduit::class,'num_commande')->nullable();
            $table->string('conditionnement_livraison');
            $table->integer('quantiter_livraison');
            $table->integer('total_livraison');
            $table->string('type_livraison')->nullable();
            $table->string('observation_livraison')->nullable();
            $table->foreignIdFor(Produit::class);
            $table->foreignIdFor(Magasinier::class,'validate_magasinier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magasin_pharmacie_livraisons');
    }
};
