<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAbsentTimeColumnToAbsentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absent_requests', function (Blueprint $table) {
            $table->decimal('absent_time', 3, 1)->after('time_absent_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absent_requests', function (Blueprint $table) {
            $table->dropColumn('absent_time');
        });
    }
}
