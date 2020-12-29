<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('uid')->nullable();
            $table->string('login')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('civility')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('locality_id')->nullable()->unsigned();
            $table->foreign('locality_id')->references('id')->on('localities');
            $table->integer('speciality_id')->nullable()->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->integer('role_id')->unsigned();
            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
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
