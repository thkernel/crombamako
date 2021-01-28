<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique()->nullable();
            $table->string('reference')->unique();
            $table->string('year');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('business_licenses');
    }
}
