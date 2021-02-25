<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Helpers;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Error;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\UnauthorizedResponse;

class BaseHelper
{
    public static function UnauthorizedResponseToError(UnauthorizedResponse $unauthorizedResponse) : ?Error
    {
        if ($unauthorizedResponse->getError()) {
            return (new Error())
                ->setMessage($unauthorizedResponse->getError());
        }

        return null;
    }
}