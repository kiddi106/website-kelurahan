<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('warga', function(User $user){
            return $user->role === 'warga';
        });
        Gate::define('user', function(User $user){
            return $user->role === 'user';
        });
    }
}
