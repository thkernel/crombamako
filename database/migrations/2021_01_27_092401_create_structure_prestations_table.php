<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructurePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_prestations', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->bigInteger('structure_id')->unsigned();
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');

            $table->bigInteger('prestation_id')->unsigned();
            $table->foreign('prestation_id')->references('id')->on('prestations')->onDelete('cascade');
            
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
        Schema::dropIfExists('structure_prestations');
    }
}
