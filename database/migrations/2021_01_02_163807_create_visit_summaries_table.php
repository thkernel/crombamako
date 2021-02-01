<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_summaries', function (Blueprint $table) {
            $table->id();
            $table->dateTime('visit_date');
            $table->dateTime('visit_hour');
            $table->string('medical_file');
            $table->string('receipt');
            $table->string('prescription_book');
            $table->string('consultation_register');
            $table->string('care_register');
            $table->string('birth_register');
            $table->string('consultation_and_treatment_office');
            $table->string('medical_clinic');
            $table->string('surgical_clinic');
            $table->string('maternity_clinic');
            $table->string('radiology_practice');
            $table->integer('structure_id')->unsigned();
            $table->foreign('structure_id')->references('id')->on('structure_profiles')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status');
            
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
        Schema::dropIfExists('visit_summaries');
    }
}
