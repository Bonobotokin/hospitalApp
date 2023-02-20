<?php

use App\Models\Fonction;
use App\Models\Personnel;
use App\Models\Role;
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
        Schema::create('personnel_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Personnel::class)->constrained();
            $table->foreignIdFor(Role::class)->constrained();
            $table->foreignIdFor(Fonction::class)->constrained();
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
        Schema::dropIfExists('personnel_roles');
    }
};
