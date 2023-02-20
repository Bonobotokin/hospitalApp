<?php

use App\Models\Patient;
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
            $table->foreignIdFor(Patient::class);
            $table->decimal('poids')->nullable();
            $table->decimal('taills')->nullable();
            $table->decimal('temperature')->nullable();
            $table->decimal('tension')->nullable();
            $table->decimal('pouls')->nullable();
            $table->decimal('frequence')->nullable();
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
