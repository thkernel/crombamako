<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_requests', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('civility')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('door')->nullable();
            $table->string('email')->unique();
            $table->integer('locality_id')->unsigned();
            $table->foreign('locality_id')->references('id')->on('localities');
            $table->integer('speciality_id')->unsigned();
            $table->foreign('speciality_id')->references('id')->on('specialities');
            $table->integer('structure_id')->nullable()->unsigned();
            $table->foreign('structure_id')->references('id')->on('structures');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('subscription_requests');
    }
}
