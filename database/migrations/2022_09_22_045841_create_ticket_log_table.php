<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_log', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->boolean('status');
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('vulnerability_ticket');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_log');
    }
}
