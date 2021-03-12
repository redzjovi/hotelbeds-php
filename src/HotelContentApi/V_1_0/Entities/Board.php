<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class Board
{
    /** @var null|string */
    protected $code;

    /** @var null|Content */
    protected $description;

    /** @var null|string */
    protected $multi_lingual_code;

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;

        if (isset($data['description']) && is_array($data['description'])) {
            $this->description = new Content($data['description']);
        }

        $this->multi_lingual_code = $data['multiLingualCode'] ?? null;
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

    public function getDescription() : ?Content
    {
        return $this->description;
    }

    public function setDescription(?Content $value)
    {
        $this->description = $value;
        return $this;
    }

    public function getMultiLingualCode() : ?string
    {
        return $this->multi_lingual_code;
    }

    public function setMultiLingualCode(?string $value)
    {
        $this->multi_lingual_code = $value;
        return $this;
    }
}
