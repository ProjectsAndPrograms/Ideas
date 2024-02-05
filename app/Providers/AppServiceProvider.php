<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive();   // to tell larvel we are using bootstrap in our project default is tailwind

        // ### WE CAN ENABLE OUR DEBUG-BAR ON ANY SPECIFIC PAGE FOR TESTING PERPOSES
        // \Debugbar::enable();      

        $topUsers = Cache::remember('topUsers' , now()->addMinutes(5), function(){
            return User::withCount('ideas')->orderBy('ideas_count', 'DESC')->take(5)->get();
        });

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
