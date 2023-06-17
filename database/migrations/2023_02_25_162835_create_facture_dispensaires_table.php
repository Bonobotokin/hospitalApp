<?php

use App\Models\Consultation;
use App\Models\Prescription;
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
        Schema::create('facture_dispensaires', function (Blueprint $table) {
            $table->id();
            $table->integer('num_facture_patient');
            $table->integer('montant')->default(0.00);
            $table->integer('reste')->default(0.00);
            $table->boolean('isNotPayed')->default(0);
            $table->foreignIdFor(Consultation::class)->nullable()->constrained();
            
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
        Schema::dropIfExists('facture_dispensaires');
    }
};
