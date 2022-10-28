<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignPlugin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plugin', function (Blueprint $table) {
            $table->bigInteger('ticket_type_id')->unsigned()->nullable();
            $table->foreign('ticket_type_id')->references('id')->on('ticket_type');
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
        Schema::table('plugin', function (Blueprint $table) {
            $table->dropForeign('plugin_ticket_type_id_foreign');
            $table->dropColumn('ticket_type_id');
        });
    }
}
