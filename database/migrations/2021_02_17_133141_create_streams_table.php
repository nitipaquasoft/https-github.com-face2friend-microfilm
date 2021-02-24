<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('streams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('content_id')->nullable();
            $table->date('stream_date')->nullable();
            $table->time('stream_time')->nullable();
            $table->time('stream_length')->nullable();
            $table->string('stream_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('streams');
    }

}
