<?php

use App\Models\User;
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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_personneles', 100);
            $table->boolean('sexe_personneles');
            $table->date('date_naissance_personneles');
            $table->string('lieu_naissance_personneles', 20);
            $table->string('adresse_personneles');
            $table->integer('telephone_1_personneles')->nullable();
            $table->integer('telephone_2_personneles')->nullable();
            $table->string('situation_matrimoniale_personneles',20);
            $table->string('titre',20)->nullable();
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
        Schema::dropIfExists('personnels');
    }
};
