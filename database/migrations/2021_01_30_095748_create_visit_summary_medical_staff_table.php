<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitSummaryMedicalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_summary_medical_staff', function (Blueprint $table) {
            $table->id();
            $table->string('doctor');
            $table->string('nurse');
            $table->string('pharmacist');
            $table->string('laboratory_assistant');
            $table->string('midwife');
            $table->string('caregiver');
            $table->bigInteger('visit_summary_id')->unsigned();
            $table->foreign('visit_summary_id')->references('id')->on('visit_summaries')->onDelete('cascade');
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
        Schema::dropIfExists('visit_summary_medical_staff');
    }
}
