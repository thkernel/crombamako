<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitSummaryBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_summary_buildings', function (Blueprint $table) {
            $table->id();
            $table->string('waiting_room');
            $table->integer('toilets_number');
            $table->integer('hospital_rooms_number');
            $table->string('resuscitation_room');
            $table->integer('doctor_offices_number');
            $table->integer('examination_rooms_number');
            $table->string('kitchen');
            $table->string('cloakroom');
            $table->integer('treatment_rooms_number');
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
        Schema::dropIfExists('visit_summary_buildings');
    }
}
