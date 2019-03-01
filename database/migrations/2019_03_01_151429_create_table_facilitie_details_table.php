<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFacilitieDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitie_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facilitie_id')->unsigned();
            $table->foreign('facilitie_id')->references('id')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->longText('content');
            $table->decimal('price', 20, 3);
            $table->longText('image');
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
        Schema::dropIfExists('facilitie_details');
    }
}
