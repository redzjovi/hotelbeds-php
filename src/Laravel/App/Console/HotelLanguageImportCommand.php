<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Console;

use Illuminate\Console\Command;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type\LanguagesRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services\TypeService;
use Redzjovi\HotelbedsPhp\Laravel\App\Models\Language;

class HotelLanguageImportCommand extends Command
{
    protected $signature = 'hotelbeds-php:hotel:language:import';

    protected $description = 'Import hotelbeds hotel languages';

    public function handle()
    {
        $this->info('Importing HotelbedsPhp Hotel Language...');

        $languages = [];

        foreach (config('hotelbeds-php.hotel.language.codes') as $hotelbedsPhpHotelLanguageCode) {
            $request = new LanguagesRequest();
            $request->setApiKey(config('hotelbeds-php.hotel.api_key'));
            $request->setSecret(config('hotelbeds-php.hotel.secret'));
            $request->setLanguage($hotelbedsPhpHotelLanguageCode);

            $service = new TypeService(config('hotelbeds-php.hotel.production'));

            $response = $service->languages($request);
            if ($error = $response->getError()) {
                $this->error($error->getMessage());
                return;
            }

            foreach ($response->getLanguages() as $responseLanguage) {
                $language = Language::query()->firstOrNew([
                    'code' => $responseLanguage->getCode(),
                ]);
                $language->name = $responseLanguage->getName();

                if ($language->save()) {
                    $languages[$language->code] = $language;
                }

                if ($responseLanguageDescription = $responseLanguage->getDescription()) {
                    $language->descriptions()->updateOrCreate(
                        ['language_code' => $responseLanguageDescription->getLanguageCode()],
                        ['content' => $responseLanguageDescription->getContent()]
                    );
                }
            }
        }

        $this->info('Imported HotelbedsPhp Hotel Language ('.count($languages).')');
    }
}