<?php

use App\Models\ExamenEchographie;
use App\Models\ExamenLaboratoire;
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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExamenLaboratoire::class)->nullable()->constrained();
            $table->foreignIdFor(ExamenEchographie::class)->nullable()->constrained();
            $table->string('resultat_examens');
            $table->string('observation_examens');
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
        Schema::dropIfExists('examens');
    }
};
