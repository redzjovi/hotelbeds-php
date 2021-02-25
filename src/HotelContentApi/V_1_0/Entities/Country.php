<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Content;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\State;

class Country
{
    /** @var null|string */
    protected $code;

    /** @var null|Content */
    protected $description;

    /** @var null|string */
    protected $iso_code;

    /** @var State[] */
    protected $states = [];

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;

        if (isset($data['description']) && is_array($data['description'])) {
            $this->description = new Content($data['description']);
        }

        $this->iso_code = $data['iso_code'] ?? null;

        if (isset($data['states']) && is_array($data['states'])) {
            foreach ($data['states'] as $state) {
                $this->states[] = new State($state);
            }
        }
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

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(?string $value)
    {
        $this->description = $value;
        return $this;
    }

    public function getIsoCode() : ?string
    {
        return $this->iso_code;
    }

    public function setIsoCode(?string $value)
    {
        $this->iso_code = $value;
        return $this;
    }

    /**
     * @return State[]
     */
    public function getStates() : array
    {
        return $this->states;
    }

    /**
     * @param State[] $value
     */
    public function setStates(array $value)
    {
        $this->states = $value;
        return $this;
    }
}
