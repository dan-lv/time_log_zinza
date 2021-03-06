<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\TimeLog;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Do Nhu Dan',
            'email' => 'nhudanmkt@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'role' => 1,
        ];

        User::insert($user);

        $userAdmin = User::first();
        for ($i = 0; $i < 3; $i++) {
            $userAdmin->timeLogs()->createMany(factory(TimeLog::class)->make()->toArray());
        }

        $userAdmin->profiles()->save(factory(Profile::class)->make());
        
        factory(User::class, 3)->create()->each(function ($user) {
            $user->profiles()->save(factory(Profile::class)->make());

            for ($i = 0; $i < 3; $i++) {
                $user->timeLogs()->createMany(factory(TimeLog::class)->make()->toArray());
            }
        });
    }
}
