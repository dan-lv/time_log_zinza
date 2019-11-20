<?php

use Illuminate\Database\Seeder;
use App\Models\TimeLog;
use App\Models\User;

class TimeLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(TimeLog::class, 3)->create();  
    }
}
