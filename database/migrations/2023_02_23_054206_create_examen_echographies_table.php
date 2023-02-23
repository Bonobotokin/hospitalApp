<?php

use App\Models\ExamenEchoType;
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
        Schema::create('examen_echographies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExamenEchoType::class)->constrained();
            $table->string('designation_examens_echo');
            $table->string('image_examens_echo')->nullable();
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
        Schema::dropIfExists('examen_echographies');
    }
};
