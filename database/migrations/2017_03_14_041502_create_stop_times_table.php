<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trip_id')->index();
            $table->time('arrival_time');
            $table->time('departure_time');
            $table->string('stop_id')->index();
            $table->integer('stop_sequence')->nullable();
            $table->tinyInteger('pickup_type')->nullable();
            $table->tinyInteger('drop_off_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stop_times');
    }
}
