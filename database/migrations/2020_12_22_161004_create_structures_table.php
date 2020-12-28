<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->integer('structure_type_id')->unsigned();
            $table->foreign('structure_type_id')->references('id')->on('structure_types');
            $table->string('name');
            $table->string('slogan')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('locality');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('website');
            $table->decimal('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('logo')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('structures');
    }
}
