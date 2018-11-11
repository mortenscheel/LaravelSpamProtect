<?php

namespace MortenScheel\SpamProtect;

use MortenScheel\SpamProtect\Listeners\OnMessageSent;
use Illuminate\Support\ServiceProvider;
use MortenScheel\SpamProtect\Listeners\OnMessageSending;

class SpamProtectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . DIRECTORY_SEPARATOR . 'migrations');
        \Event::listen('Illuminate\Mail\Events\MessageSending', OnMessageSending::class);
        \Event::listen('Illuminate\Mail\Events\MessageSent', OnMessageSent::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
