<?php

namespace App\Providers;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\ProductType;
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
    public function boot()
    {
        view()->composer("header", function ($view) {
            $loai_sp = ProductType::all();
            $view->with("loai_sp", $loai_sp);
        });
    }
}
