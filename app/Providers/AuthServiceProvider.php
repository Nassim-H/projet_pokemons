<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Pokemon;
use App\Policies\PokemonPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Pokemon::class =>PokemonPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-tache', function ($user, $pokemon) {
            return $user->id === $pokemon->user_id;


        });

    }



}
