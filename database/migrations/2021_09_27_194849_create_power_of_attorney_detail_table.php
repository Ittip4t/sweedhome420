<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerOfAttorneyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_of_attorney_detail', function (Blueprint $table) {
            $table->id();
            $table->morphs('grantor');
            $table->morphs('attorney');
            $table->string('witness1');
            $table->string('witness2');
            $table->string('other');
            $table->string('alien_job_description');
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
        Schema::dropIfExists('power_of_attorney_detail');
    }
}
