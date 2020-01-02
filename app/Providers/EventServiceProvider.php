<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserCreated;
use App\Listeners\CreateProfile;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserCreated::class => [
            CreateProfile::class,
        ],

        'App\Events\TimeLogCreated' => [
            'App\Listeners\CaculateWorkingTime'
        ],

        'App\Events\AbsentCreated' => [
            'App\Listeners\CaculateAbsentTime'
        ],

        'App\Events\ProfileUpdated' => [
            'App\Listeners\CreateLogProfile',
        ],

        'App\Events\AbsentReplied' => [
            'App\Listeners\SendEmailNotification',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
