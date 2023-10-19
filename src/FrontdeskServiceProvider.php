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
            ->hasMigrations([
                'create_menus_table',
                'create_menuables_table',
                'create_hyperlinks_table',
            ]);
    }
}
