<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('adm', function ($user) {

            if ($user->profile == 'Administrador'){
                return true;
            }
 
            return false;
 
        });

        Gate::define('user', function ($user) {

            if ($user->profile == 'Cliente'){
                return true;
            }
 
            return false;
 
        });

        Gate::define('medic', function ($user) {

            if ($user->profile == 'Médico'){
                return true;
            }
 
            return false;
 
        });

        Gate::define('work', function ($user) {

            if ($user->profile == 'Funcionário'){
                return true;
            }
 
            return false;
 
        });



        //
    }
}
