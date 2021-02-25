<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class Error
{
    /** @var null|string */
    protected $code;

    /** @var null|string */
    protected $message;

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;
        $this->message = $data['message'] ?? null;
    }

    public function getCode() : ?string
    {
        return $this->code;
    }

    public function setCode(?string $value)
    {
        $this->code = $value;
        return $this;
    }

    public function getMessage() : ?string
    {
        return $this->message;
    }

    public function setMessage(?string $value)
    {
        $this->message = $value;
        return $this;
    }
}
