<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('doc_template_id')->nullable();
            $table->foreign('doc_template_id')
                ->references('id')
                ->on('document_templates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('doc_detail_id')->nullable();
            $table->foreign('doc_detail_id')
                ->references('id')
                ->on('power_of_attorney_detail')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
        Schema::dropIfExists('documents');
    }
}
