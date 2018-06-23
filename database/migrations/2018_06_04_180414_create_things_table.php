<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac');
            $table->boolean('configurado')->default('1');
            $table->string('ip')->nullable();
            $table->string('netmask')->nullable();
            $table->string('gateway')->nullable();
            $table->string('dns')->nullable();
            $table->string('ssid')->nullable();
            $table->string('password')->nullable();
            $table->timestamp("configDate");
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
        Schema::dropIfExists('things');
    }
}
