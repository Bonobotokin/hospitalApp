<?php

use App\Models\Consultation;
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
        Schema::create('consultation_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Consultation::class)->constrained();
            $table->foreignIdFor(Prescription::class)->constrained();
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
        Schema::dropIfExists('consultation_prescriptions');
    }
};
