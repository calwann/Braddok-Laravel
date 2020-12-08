<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view) {
            view()->share('patentNickname', Controller::patent(Auth::user()->patent) . " - " . \strtoupper(Auth::user()->nickname));
            view()->share('fullPatentNickname', Controller::fullPatent(Auth::user()->patent) . " - " . \strtoupper(Auth::user()->nickname));
        });
    }
}
