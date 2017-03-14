<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stop_id')->nullable()->index();
            $table->string('stop_code')->nullable();
            $table->string('stop_name')->nullable();
            $table->string('stop_desc')->nullable();
            $table->decimal('stop_lat', 10, 10)->nullable();
            $table->decimal('stop_lon', 10, 10)->nullable();
            $table->string('zone_id')->nullable();
            $table->string('stop_url')->nullable();
            $table->string('location_type')->nullable();
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
        Schema::dropIfExists('stops');
    }
}
