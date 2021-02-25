<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services;

use GuzzleHttp\Client;

class BaseService
{
    const TIMEOUT = 120;

    /** @var bool */
    protected $production;

    public function __construct($production = false)
    {
        $this->production = $production;
    }

    public function getClient()
    {
        return new Client();
    }
    
    public function getProduction() : bool
    {
        return $this->production;
    }
}
