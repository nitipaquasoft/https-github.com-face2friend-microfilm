<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('footer_tagline')->nullable();
            $table->string('contact')->nullable();
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->string('dashboard_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('configurtions');
    }

}
