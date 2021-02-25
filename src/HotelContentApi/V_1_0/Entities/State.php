<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class State
{
    /** @var null|string */
    protected $code;

    /** @var null|string */
    protected $name;

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;
        $this->name = $data['name'] ?? null;
    }

    public function getCode() : ?string
    {
        return $this->code;
    }

    public function getName() : ?string
    {
        return $this->name;
    }
}
