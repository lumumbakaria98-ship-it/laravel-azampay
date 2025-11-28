<?php

declare(strict_types=1);

namespace Alphaolomi\Azampay;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AzampayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-azampay')
            ->hasRoute('azampay_api')
            ->hasConfigFile();
    }

public function packageRegistered()
{
    // bind the class itself so the facade resolving by class name works
    $this->app->bind(\Alphaolomi\Azampay\AzampayService::class, function () {
        return new \Alphaolomi\Azampay\AzampayService();
    });

    // also bind short key for backwards compat (optional)
    $this->app->bind('azampay', function ($app) {
        return $app->make(\Alphaolomi\Azampay\AzampayService::class);
    });
}

}
