<?php

use App\Models\Consultation;
use App\Models\Examen;
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
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Consultation::class)->nullable();
            $table->foreignIdFor(Prescription::class)->nullable();
            $table->foreignIdFor(Examen::class)->nullable();
            $table->integer('montant')->default(0);
            $table->integer('reste')->default(0);
            $table->boolean('Ispaed');
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
        Schema::dropIfExists('caisses');
    }
};
