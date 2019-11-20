<?php

use Illuminate\Database\Seeder;
use App\Models\TrackingChange;

class TrackingChangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TrackingChange::class, 3)->create();
    }
}
