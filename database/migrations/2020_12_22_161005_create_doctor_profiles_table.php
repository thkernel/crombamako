<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            
            $table->integer('town_id')->nullable()->unsigned();
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');

            $table->integer('neighborhood_id')->nullable()->unsigned();
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            
            $table->boolean('is_specialist')->nullable();

            $table->integer('speciality_id')->nullable()->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            
            $table->integer('structure_id')->nullable()->unsigned();
            $table->foreign('structure_id')->references('id')->on('structure_profiles')->onDelete('cascade');
            $table->text('description')->nullable();

            $table->integer('service_id')->nullable()->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            
            
            $table->string('status')->nullable();

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
        Schema::dropIfExists('doctor_profiles');
    }
}
