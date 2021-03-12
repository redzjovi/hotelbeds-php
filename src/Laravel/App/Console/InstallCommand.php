<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'hotelbeds-php:install';

    protected $description = 'Install the HotelbedsPhp';

    public function handle()
    {
        $this->info('Installing HotelbedsPhp...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "Redzjovi\HotelbedsPhp\Laravel\App\Providers\HotelbedsPhpServiceProvider",
            '--tag' => "config"
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Redzjovi\HotelbedsPhp\Laravel\App\Providers\HotelbedsPhpServiceProvider",
            '--tag' => "migrations"
        ]);

        $this->info('Installed HotelbedsPhp');
    }
}