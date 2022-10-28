<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLearnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_learn', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plugin_learn_id')->unsigned()->nullable();
            $table->boolean('status');
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->foreign('plugin_learn_id')->references('id')->on('plugin_learn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_learn');
    }
}
