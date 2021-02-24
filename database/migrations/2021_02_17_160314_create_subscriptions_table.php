<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('valid_till')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('subscriptions');
    }

}
