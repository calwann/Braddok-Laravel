<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        view()->composer('*', function ($view) {
            if (isset(Auth::user()->id)) {
                view()->share('patentNickname', Controller::patent(Auth::user()->patent) . " - " . \strtoupper(Auth::user()->nickname));
                view()->share('fullPatentNickname', Controller::fullPatent(Auth::user()->patent) . " - " . \strtoupper(Auth::user()->nickname));
            }
        });

        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\ConciergeChart::class
        ]);
    }
}
