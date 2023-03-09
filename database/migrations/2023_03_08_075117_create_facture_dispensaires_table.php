<?php

use App\Models\Consultation;
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
            $table->double('montant', 8, 2)->default(0);
            $table->double('reste', 8, 2)->default(0);
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
