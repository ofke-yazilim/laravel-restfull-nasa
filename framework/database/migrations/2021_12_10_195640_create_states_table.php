<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->integer('rover_id')->nullable(false);
            $table->integer('moved_x')->default(0);
            $table->integer('moved_y')->default(0);
            $table->integer('rover_x')->default(0);
            $table->integer('rover_y')->default(0);
            $table->string('rover_rotation'); // R:Sağ L:Sol
            $table->string('rover_direction'); // N:Kuzey S:Güney W:Batı E:Doğu
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
        Schema::dropIfExists('states');
    }
}
