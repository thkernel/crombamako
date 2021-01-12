<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEloquentStorageBlobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eloquent_storage_blobs', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('filename');
            $table->string('content_type');
            $table->text('metadata')->nullable();
            $table->bigInteger('byte_size');
            $table->string('checksum');
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
        Schema::dropIfExists('eloquent_storage_blobs');
    }
}

