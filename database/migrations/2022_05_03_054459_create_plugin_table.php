<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePluginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugin', function (Blueprint $table) {
            $table->id();
            $table->string('idp');
            $table->string('name');
            $table->string('solution');
            $table->string('rollback');
            $table->bigInteger('operating_system_id')->unsigned()->nullable();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('operating_system_id')->references('id')->on('operating_system');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plugin');
    }
}
