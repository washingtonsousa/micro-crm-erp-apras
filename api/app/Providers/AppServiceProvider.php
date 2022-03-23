<?php

namespace App\Providers;

use App\Core\Infra\Provider\Ioc\DomainServiceProviderModule;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        DomainServiceProviderModule::Inject($this->app);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
