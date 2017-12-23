<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userType')->nullable();
            $table->string('contactType')->nullable();
            $table->string('identification')->nullable();
            $table->string('name')->nullable();
            $table->string('lastName', 225)->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('locationVote')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('imageProfile')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('level')->nullable();
            $table->integer('leaderPrincipal')->nullable();
            $table->integer('userId')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('Roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('UserRoles', function (Blueprint $table) {
            $table->increments('id');
            /* Foreign key Users */
            $table->integer('userId')->unsigned();
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            /* Foreign key Pets */
            $table->integer('rolId')->unsigned();
            $table->foreign('rolId')
                ->references('id')->on('Roles')
                ->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
