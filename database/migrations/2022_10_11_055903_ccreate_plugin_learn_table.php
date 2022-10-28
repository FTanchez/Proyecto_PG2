<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CcreatePluginLearnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plugin_learn', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plugin_id')->unsigned()->nullable();
            $table->text('solution')->nullable();
            $table->text('rollback')->nullable();
            $table->boolean('status');
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->foreign('plugin_id')->references('id')->on('plugin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('plugin_learn');
    }
}
