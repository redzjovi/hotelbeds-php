<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Console;

use Illuminate\Console\Command;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type\BoardsRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services\TypeService;
use Redzjovi\HotelbedsPhp\Laravel\App\Models\Board;

class HotelBoardImportCommand extends Command
{
    protected $signature = 'hotelbeds-php:hotel:board:import';

    protected $description = 'Import hotelbeds hotel boards';

    public function handle()
    {
        $this->info('Importing HotelbedsPhp Hotel Board...');

        $responseBoards = [];

        foreach (config('hotelbeds-php.hotel.language.codes') as $hotelbedsPhpHotelLanguageCode) {
            $request = new BoardsRequest();
            $request->setApiKey(config('hotelbeds-php.hotel.api_key'));
            $request->setSecret(config('hotelbeds-php.hotel.secret'));
            $request->setLanguage($hotelbedsPhpHotelLanguageCode);

            $service = new TypeService(config('hotelbeds-php.hotel.production'));

            $response = $service->boards($request);
            if ($error = $response->getError()) {
                $this->error($error->getMessage());
                return;
            }

            foreach ($response->getBoards() as $responseBoard) {
                $board = Board::query()->firstOrNew([
                    'code' => $responseBoard->getCode(),
                ]);
                $board->multi_lingual_code = $responseBoard->getMultiLingualCode();

                if ($board->save()) {
                    $responseBoards[$board->code] = $board;
                }

                if ($responseBoardDescription = $responseBoard->getDescription()) {
                    $board->descriptions()->updateOrCreate(
                        ['language_code' => $responseBoardDescription->getLanguageCode()],
                        ['content' => $responseBoardDescription->getContent()]
                    );
                }
            }
        }

        $this->info('Imported HotelbedsPhp Hotel Board ('.count($responseBoards).')');
    }
}