<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('callcenterUsers', function (Blueprint $table) {
          $table->increments('id');
          /* Foreign key Users */
          $table->integer('userId')->nullable();
          $table->integer('callCenterId')->nullable();
          $table->timestamps();
      });
      Schema::create('Calls', function (Blueprint $table) {
          $table->increments('id');
          /* Foreign key Users */
          $table->boolean('status')->nullable();
          $table->string('description')->nullable();
          $table->string('answer')->nullable();
          $table->integer('userId')->unsigned();
          $table->foreign('userId')
              ->references('id')->on('users')
              ->onDelete('cascade');
          /* Foreign key Pets */
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
        Schema::dropIfExists('callcenterUsers');
        Schema::dropIfExists('Calls');
    }
}
