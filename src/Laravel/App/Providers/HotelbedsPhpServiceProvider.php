<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Redzjovi\HotelbedsPhp\Laravel\App\Console\HotelImportCommand;
use Redzjovi\HotelbedsPhp\Laravel\App\Console\HotelLanguageImportCommand;
use Redzjovi\HotelbedsPhp\Laravel\App\Console\InstallCommand;
use Redzjovi\HotelbedsPhp\Laravel\App\Models\Description;
use Redzjovi\HotelbedsPhp\Laravel\App\Models\Language;

class HotelbedsPhpServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                HotelImportCommand::class,
                HotelLanguageImportCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../../config/hotelbeds-php.php' => config_path('hotelbeds-php.php'),
            ], 'hotelbeds-php-config');

            if (! class_exists('CreateHotelbedsHotelDescriptionTable')) {
                $this->publishes([
                  __DIR__ . '/../../database/migrations/create_table_hotelbeds_hotel_description_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_hotelbeds_hotel_description_table.php'),
                ], 'migrations');
            }

            if (! class_exists('CreateHotelbedsHotelLanguageTable')) {
                $this->publishes([
                  __DIR__ . '/../../database/migrations/create_table_hotelbeds_hotel_language_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_hotelbeds_hotel_language_table.php'),
                ], 'migrations');
            }
        }

        Relation::morphMap([
            config('hotelbeds-php.table_names.hotel.description') => Description::class,
            config('hotelbeds-php.table_names.hotel.language') => Language::class,
        ]);
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/hotelbeds-php.php', 'hotelbeds-php');
    }
}