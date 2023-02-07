<?php

use App\Models\Depot;
use App\Models\Fournisseur;
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
            $table->foreignIdFor(Fournisseur::class);
            $table->integer('quantite_mouvement')->default(0);
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
