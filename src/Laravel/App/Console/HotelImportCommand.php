<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class HotelImportCommand extends Command
{
    protected $signature = 'hotelbeds-php:hotel:import';

    protected $description = 'Import hotelbeds hotel';

    public function handle()
    {
        $this->info('Importing HotelbedsPhp Hotel...');

        Artisan::call('hotelbeds-php:hotel:language:import');

        $this->info('Imported HotelbedsPhp Hotel');
    }
}