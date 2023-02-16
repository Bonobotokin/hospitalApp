<?php

use App\Models\PatientParametre;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_patient');
            $table->string('prenom_patient')->nullable();
            $table->boolean('sexe_patient');
            $table->integer('Age_patient');
            $table->string('profession_patient')->nullable();
            $table->string('adresse_patient')->nullable();
            $table->integer('situation_matrimoniale_patient');
            $table->integer('telephone_1_patient')->nullable();
            $table->integer('telephone_2_patient')->nullable();
            $table->boolean('isPersonnelFlm')->default(0);
            $table->string('nomPere_patient')->nullable();
            $table->string('nomMere_patient')->nullable();
            $table->string('nomPere_reference_patient')->nullable();
            $table->string('telephone_reference_patient')->nullable();
            $table->foreignIdFor(PatientParametre::class)->nullable();
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
        Schema::dropIfExists('patients');
    }
};
