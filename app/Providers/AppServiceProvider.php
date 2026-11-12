<?php

namespace App\Providers;

use App\Application\Invoices\Ports\IUblGeneratorPort;
use App\Infrastructure\Ubl\UblInvoiceXmlAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUblGeneratorPort::class, UblInvoiceXmlAdapter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
