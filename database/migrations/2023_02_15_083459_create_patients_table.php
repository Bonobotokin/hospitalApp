<?php

use App\Models\PatientParametre;
use App\Models\ServiceMedicale;
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
            $table->string('matricule');
            $table->string('nom_patient');
            $table->string('prenom_patient')->nullable();
            $table->boolean('sexe_patient');
            $table->integer('Age_patient');
            $table->string('profession_patient')->nullable();
            $table->string('adresse_patient')->nullable();
            $table->string('situation_matrimoniale_patient');
            $table->string('telephone_1_patient')->nullable();
            $table->string('telephone_2_patient')->nullable();
            $table->string('nomPere_patient')->nullable();
            $table->string('nomMere_patient')->nullable();
            $table->string('nomPere_reference_patient')->nullable();
            $table->string('telephone_reference_patient')->nullable();
            $table->boolean('IsHospitaled')->default(0);
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
