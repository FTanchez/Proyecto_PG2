<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaselineTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseline_ticket', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plugin_id')->unsigned()->nullable();
            $table->date("asigned_date");
            $table->bigInteger('severity_id')->unsigned()->nullable();
            $table->string("ip", 20);
            $table->string("port", 10);
            $table->string("dns", 100);
            $table->text("plugin_output");
            $table->text("maker_solution");
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean("authorized");
            $table->bigInteger('execute_id')->unsigned()->nullable();
            $table->text("solution");
            $table->text("rollback");
            $table->date("solution_date");
            $table->boolean("status");
            $table->timestamps();

            $table->foreign('plugin_id')->references('id')->on('plugin');
            $table->foreign('severity_id')->references('id')->on('severity');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('execute_id')->references('id')->on('execute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baseline_ticket');
    }
}
