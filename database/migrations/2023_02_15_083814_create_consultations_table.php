<?php

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\TypeConsultation;
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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained();
            $table->foreignIdFor(TypeConsultation::class)->constrained();            
            $table->foreignIdFor(Medecin::class)->constrained();      
            $table->boolean('consulted')->default(false);
            $table->string('diagnostique')->nullable();
            $table->string('symptome')->nullable();
            $table->string('prix')->default(5000);
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
        Schema::dropIfExists('consultations');
    }
};
