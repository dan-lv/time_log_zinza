<?php

use Illuminate\Database\Seeder;
use App\Models\AbsentRequest;

class AbsentRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AbsentRequest::class, 3)->create();
    }
}
