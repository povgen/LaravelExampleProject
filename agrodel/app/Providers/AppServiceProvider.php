<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ProductCategoryObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductCategory;
use App\Models\Product;

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
        ProductCategory::observe(ProductCategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
