<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Service;
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

            $totalClient = Client::count();
            $activeClients = Client::where('status', 1)->count();
            $inactiveClients = Client::where('status', 0)->count();
            $facebookReview = Client::where('facebook_review', 0)->count();

            $totalService = Service::count();
           

            $view->with(
                [
                    'currentYear' => $currentYear,
                    'currentMonth' => $currentMonth,
                    'currentDay' => $currentDay,
                    'currentDayName' => $currentDayName,
                    'totalClient' => $totalClient,
                    'activeClients' => $activeClients,
                    'inactiveClients' => $inactiveClients,
                    'facebookReview' => $facebookReview,
                    'totalService' => $totalService,
                ]
            );
        });
    }
}
