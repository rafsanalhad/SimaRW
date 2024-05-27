<?php

namespace App\Providers;

use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use App\Observers\UpdateBansosObserver;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Unsplash\HttpClient;

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
        HttpClient::init([
            'applicationId'	=> env('UNSPLASH_ACCESS_KEY'),
            'secret'	=> env('UNSPLASH_SECRET'),
            'callbackUrl'	=> env('UNSPLASH_CALLBACK_URL'),
            'utmSource' => env('UNSPLASH_UTM_SOURCE'),
        ]);

        // Observer Update SPK Bansos
        UserModel::observe(UpdateBansosObserver::class);
    }
}
