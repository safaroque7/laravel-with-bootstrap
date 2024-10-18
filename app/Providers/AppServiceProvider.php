<?php

namespace App\Providers;

use Carbon\Carbon;
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
        View::composer('*', function ($view){
            $currentYear = Carbon::now()->format('Y');
            $currentMonth = Carbon::now()->format('F');
            $currentDay = Carbon::now()->format('d');
            $currentDayName = Carbon::now()->format('l');

            $view->with(
                [
                    'currentYear' => $currentYear,
                    'currentMonth' => $currentMonth,
                    'currentDay' => $currentDay,
                    'currentDayName' => $currentDayName,
                ]
            );
        });
    }
}
