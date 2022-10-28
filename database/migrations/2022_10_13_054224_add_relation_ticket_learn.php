<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationTicketLearn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ticket_learn', function (Blueprint $table) {
            $table->bigInteger('ticket_id')->unsigned()->nullable();
            $table->foreign('ticket_id')->references('id')->on('vulnerability_ticket');
        });
    }

    /**
     * Reverse the migrations.
     *php
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ticket_learn', function (Blueprint $table) {
            $table->dropForeign('ticket_learn_ticket_id_foreign');
            $table->dropColumn('ticket_id');
        });
    }
}
