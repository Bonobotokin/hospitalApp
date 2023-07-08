<?php

use App\Models\TypeExamenLaboratoire;
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
        Schema::create('examen_laboratoires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypeExamenLaboratoire::class)->constrained();
            $table->string('designation_examens_labo');
            $table->string('categorie_examens_labo')->nullable();
            $table->string('valeurs_referrences')->nullable();
            $table->string('Unite')->nullable();
            $table->integer('prix_examen');
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
        Schema::dropIfExists('examen_laboratoires');
    }
};
