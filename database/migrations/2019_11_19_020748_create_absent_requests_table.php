<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absent_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time_absent_from');
            $table->time('time_absent_to');
            $table->text('reason');
            $table->smallInteger('status');
            $table->date('day');
            $table->integer('user_id');
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
        Schema::dropIfExists('absent_requests');
    }
}
