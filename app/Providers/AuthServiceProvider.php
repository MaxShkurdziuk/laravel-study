<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Policies\ActorPolicy;
use App\Policies\FilmPolicy;
use App\Policies\GenrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Film::class => FilmPolicy::class,
        Genre::class => GenrePolicy::class,
        Actor::class => ActorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
