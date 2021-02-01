<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitSummaryMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_summary_materials', function (Blueprint $table) {
            $table->id();
            $table->string('sterilization_device');
            $table->string('oxygen_source');
            $table->string('communication_source');
            $table->string('freezer_or_fridge');
            $table->string('generator');
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
        Schema::dropIfExists('visit_summary_materials');
    }
}
