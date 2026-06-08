<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS si l'URL n'est pas localhost (ex: via ngrok)
        if (request()->getHost() !== 'localhost' && request()->getHost() !== '127.0.0.1') {
            URL::forceScheme('https');
        }
    }
}