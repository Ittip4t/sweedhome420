<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThaiPostalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thai_postal_codes', function (Blueprint $table) {
            $table->unsignedInteger('postal_code');
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('sub_district_id');
            $table->foreign('sub_district_id')
                ->references('id')
                ->on('sub_districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('province_id');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['district_id','sub_district_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thai_postal_codes');
    }
}
