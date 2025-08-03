<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\PengajuanKia;
use App\Observers\PengajuanKiaObserver;

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
        Blade::component('components.card-pengajuan-online', 'card-pengajuan-online');
        
        // Register observers
        PengajuanKia::observe(PengajuanKiaObserver::class);
    }
}
