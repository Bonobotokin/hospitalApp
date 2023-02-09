<?php

use App\Models\Produit;
use App\Models\Pharmacien;
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
        Schema::create('stock_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('conditionnement_pharmacie')->nullable();
            $table->integer('quantite_pharmacie')->default(0);
            $table->foreignIdFor(Produit::class)->constrained();
            $table->foreignIdFor(Pharmacien::class)->constrained();
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
        Schema::dropIfExists('stock_pharmacies');
    }
};
