<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Home\CatesController;
use App\Http\Controllers\Home\RecommendationsController;
use App\Http\Controllers\Admin\WebsetController;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('data_array', [CatesController::getCates(),RecommendationsController::getRecommendations(),WebsetController::webset()]);
    }

    /**
     * Register any application services.
     *sssssssssss
     * @return void
     */
    public function register()
    {
        //
    }
}
