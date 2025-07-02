<?php

namespace App\Providers;

use App\Models\Kategori;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useTailwind();
        View::composer('*', function ($view) {
            $kategoriGroups = Kategori::all()->groupBy('group');
            $view->with('kategoriGroups', $kategoriGroups);
        });
    }
}
