<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructurePrestationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_prestation_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('structure_prestation_id')->unsigned();
            $table->foreign('structure_prestation_id')->references('id')->on('structure_prestations')->onDelete('cascade');

            $table->bigInteger('prestation_id')->unsigned();
            $table->foreign('prestation_id')->references('id')->on('prestations')->onDelete('cascade');
            
            
            
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
        Schema::dropIfExists('structure_prestation_items');
    }
}
