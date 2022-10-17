<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Listeners\SaveUserLoginHistory;
use App\Listeners\SendVerifyMessage;
use App\Models\Film;
use App\Observers\FilmObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserLoggedIn::class => [
            SaveUserLoginHistory::class,
        ],
        UserRegistered::class => [
            SendVerifyMessage::class,
        ],
    ];

    protected $observers = [
        Film::class => [
            FilmObserver::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
