<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitSummaryStructureActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_summary_structure_activities', function (Blueprint $table) {
            $table->id();
            $table->string('general_consultation');
            $table->string('specialist_consultation');
            $table->string('cpn');
            $table->string('labor_room');
            $table->string('general_ultrasound');
            $table->string('specialized_ultrasound');
            $table->string('digestive_endoscopy');
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
        Schema::dropIfExists('visit_summary_structure_activities');
    }
}
