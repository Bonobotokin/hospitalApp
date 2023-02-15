<?php

use App\Models\Depot;
use App\Models\LivraisonProduits;
use App\Models\MagasinPharmacieLivraison;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvement_depots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Depot::class); 
            $table->foreignIdFor(LivraisonProduits::class)->nullable();
            $table->foreignIdFor(MagasinPharmacieLivraison::class)->nullable();
            $table->integer('quantite_mouvement');
            $table->string('type_mouvement');
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
        Schema::dropIfExists('mouvement_depots');
    }
};
