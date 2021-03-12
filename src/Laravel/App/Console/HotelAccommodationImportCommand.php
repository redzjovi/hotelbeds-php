<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Console;

use Illuminate\Console\Command;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type\AccommodationsRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services\TypeService;
use Redzjovi\HotelbedsPhp\Laravel\App\Models\Accommodation;

class HotelAccommodationImportCommand extends Command
{
    protected $signature = 'hotelbeds-php:hotel:accommodation:import';

    protected $description = 'Import hotelbeds hotel accommodations';

    public function handle()
    {
        $this->info('Importing HotelbedsPhp Hotel Accommodation...');

        $responseAccommodations = [];

        foreach (config('hotelbeds-php.hotel.language.codes') as $hotelbedsPhpHotelLanguageCode) {
            $request = new AccommodationsRequest();
            $request->setApiKey(config('hotelbeds-php.hotel.api_key'));
            $request->setSecret(config('hotelbeds-php.hotel.secret'));
            $request->setLanguage($hotelbedsPhpHotelLanguageCode);

            $service = new TypeService(config('hotelbeds-php.hotel.production'));

            $response = $service->accommodations($request);
            if ($error = $response->getError()) {
                $this->error($error->getMessage());
                return;
            }

            foreach ($response->getAccommodations() as $responseAccommodation) {
                $accommodation = Accommodation::query()->firstOrNew([
                    'code' => $responseAccommodation->getCode(),
                ]);
                $accommodation->type_description = $responseAccommodation->getTypeDescription();

                if ($accommodation->save()) {
                    $responseAccommodations[$accommodation->code] = $accommodation;
                }

                if ($responseAccommodationTypeMultiDescription = $responseAccommodation->getTypeMultiDescription()) {
                    $accommodation->typeMultiDescriptions()->updateOrCreate(
                        ['language_code' => $responseAccommodationTypeMultiDescription->getLanguageCode()],
                        ['content' => $responseAccommodationTypeMultiDescription->getContent()]
                    );
                }
            }
        }

        $this->info('Imported HotelbedsPhp Hotel Accommodation ('.count($responseAccommodations).')');
    }
}