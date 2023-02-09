<?php

use App\Models\Magasinier;
use App\Models\StockPharmacie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvement_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StockPharmacie::class)->constrained();
            $table->foreignIdFor(Magasinier::class)->constrained();
            $table->integer('quantite_mvm_pharmacie')->default(0);
            $table->string('type_mvm_pharmacie');
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
        Schema::dropIfExists('mouvement_pharmacies');
    }
};
