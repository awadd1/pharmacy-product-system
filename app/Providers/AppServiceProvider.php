<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Interfaces\PharmacyRepositoryInterface;
use App\Repositories\PharmacyRepository;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(PharmacyRepositoryInterface::class, PharmacyRepository::class);
    }

    public function boot(): void
    {
        //
    }
}