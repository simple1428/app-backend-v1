<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public static $permission = [
        'dashboard' => ['superadmin','admin',],
        'user-index' => ['admin','user']
    ];
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        foreach (self::$permission as $feature => $rules){
            Gate::define($feature, function(User $user) use ($rules){
                if (in_array ( $user->role ,$rules)){
                    return true;
                }
            });

        }
    }
}