<?php

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
        Schema::create('patient_parametres', function (Blueprint $table) {
            $table->id();
            $table->integer('poids');
            $table->decimal('taills');
            $table->integer('temperature');
            $table->decimal('tension');
            $table->integer('pouls');
            $table->decimal('frequence');
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
        Schema::dropIfExists('patient_parametres');
    }
};
