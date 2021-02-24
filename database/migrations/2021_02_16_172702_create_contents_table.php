<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('episode')->nullable();
            $table->time('timelength')->nullable();
            $table->string('cost_per_stream')->nullable();
            $table->date('release_date')->nullable();
            $table->string('distributer')->nullable();
            $table->string('censor_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contents');
    }

}
