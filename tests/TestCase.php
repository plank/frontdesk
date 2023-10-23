<?php

namespace Plank\Frontdesk\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Plank\Contentable\ContentableServiceProvider;
use Plank\Frontdesk\FrontdeskServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Plank\\Frontdesk\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FrontdeskServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        // Built-in model migrations
        $migration = include __DIR__.'/../database/migrations/create_menus_table.php.stub';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_hyperlinks_table.php.stub';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_menuables_table.php.stub';
        $migration->up();


        // Test model migrations
        $migration = include __DIR__.'/Database/Migrations/create_articles_table.php';
        $migration->up();

        $migration = include __DIR__.'/Database/Migrations/create_pages_table.php';
        $migration->up();

    }
}
