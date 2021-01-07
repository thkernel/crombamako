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
            $table->integer('structure_category_id')->unsigned();
            $table->foreign('structure_category_id')->references('id')->on('structure_categories');
            $table->string('name')->unique();
            $table->string('slogan')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('locality_id');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('website');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('logo')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
