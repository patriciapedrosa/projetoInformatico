<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControladorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controladors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip')->nullable();
            $table->string('mac')->nullable();
            $table->string('ssid')->nullable();
            $table->string('password')->nullable();
            $table->boolean('configurado')->default($value = 0);
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
        Schema::dropIfExists('controladors');
    }
}
