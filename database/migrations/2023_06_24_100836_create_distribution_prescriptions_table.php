<?php

use App\Models\DistributionPharmacie;
use App\Models\FactureDispensaire;
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
        Schema::create('distribution_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DistributionPharmacie::class)->constrained();
            $table->foreignIdFor(Prescription::class)->constrained();
            $table->foreignIdFor(FactureDispensaire::class)->constrained();
            $table->boolean('isDistribued')->default(0);
            $table->integer('distribuer')->nullable();
            $table->integer('reste')->nullable();
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
        Schema::dropIfExists('distribution_prescriptions');
    }
};
