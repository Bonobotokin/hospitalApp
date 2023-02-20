<?php

use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Produit;
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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produit::class)->nullable()->constrained();
            $table->string('posologie')->nullable();
            $table->integer('quantite')->nullable();
            $table->string('durrer');
            $table->string('commentaire')->nullable();
            $table->foreignIdFor(Medecin::class);
            $table->foreignIdFor(Consultation::class);
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
        Schema::dropIfExists('prescriptions');
    }
};
