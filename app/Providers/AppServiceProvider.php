<?php

namespace App\Providers;

use App\Interface\ICargo;
use Illuminate\Support\ServiceProvider;
use App\Interface\IPdf;
use App\Interface\IUnitOfWork;
use App\Models\Cargo;
use App\Repositories\CargoRepository;
use App\Service\Pdf;
use App\Service\UnitOfWork1;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPdf::class, Pdf::class);
        $this->app->bind(IUnitOfWork::class, UnitOfWork1::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'es_ES');
    }
}
