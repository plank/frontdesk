<?php

namespace Plank\Frontdesk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FrontdeskServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('frontdesk')
            ->hasConfigFile()
            ->hasMigration('create_navigations_table');
    }
}
