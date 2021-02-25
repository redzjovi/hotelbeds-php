<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses;

class UnauthorizedResponse extends BaseResponse
{
    /** @var null|string */
    protected $error;

    public function __construct(array $data = [])
    {
        $this->error = $data['error'] ?? null;
    }

    public function getError() : ?string
    {
        return $this->error;
    }

    public function setError(?string $value)
    {
        $this->error = $value;
        return $this;
    }
}
