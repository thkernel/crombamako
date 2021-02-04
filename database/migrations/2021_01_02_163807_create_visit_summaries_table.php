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


            //visit_summary_buildings
            $table->string('waiting_room');
            $table->integer('toilets_number');
            $table->integer('hospital_rooms_number');
            $table->string('resuscitation_room');
            $table->integer('doctor_offices_number');
            $table->integer('examination_rooms_number');
            $table->string('kitchen');
            $table->string('cloakroom');
            $table->integer('treatment_rooms_number');

            // visit_summary_materials
            $table->string('sterilization_device');
            $table->string('oxygen_source');
            $table->string('communication_source');
            $table->string('freezer_or_fridge');
            $table->string('generator');

            //visit_summary_medical_staff
            $table->string('doctor');
            $table->string('nurse');
            $table->string('pharmacist');
            $table->string('laboratory_assistant');
            $table->string('midwife');
            $table->string('caregiver');

            //visit_summary_non_medical_staff
            $table->string('director');
            $table->string('secretory');
            $table->string('accounting');

            //visit_summary_recommendations
            $table->string('cleanliness');
            $table->string('biomedical_waste_management');
            $table->string('data_feedback');
            $table->string('security_box');
            $table->string('tricolor_bins');
        
            // visit_summary_structure_activities
            $table->string('general_consultation');
            $table->string('specialist_consultation');
            $table->string('cpn');
            $table->string('labor_room');
            $table->string('general_ultrasound');
            $table->string('specialized_ultrasound');
            $table->string('digestive_endoscopy');
            $table->string('surgery_block');
            $table->string('radiology_room');
            $table->string('biomedical_laboratory');

            // visit_summary_observations
            $table->string('strong_points');
            $table->string('weak_points');
            $table->string('recommendations');
            $table->string('conclusion');
            
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
