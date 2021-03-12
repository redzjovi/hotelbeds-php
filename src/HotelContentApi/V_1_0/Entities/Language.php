<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class Language
{
    /** @var null|string */
    protected $code;

    /** @var null|Content */
    protected $description;

    /** @var null|string */
    protected $name;

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;

        if (isset($data['description']) && is_array($data['description'])) {
            $this->description = new Content($data['description']);
        }

        $this->name = $data['name'] ?? null;
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

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(?string $value)
    {
        $this->name = $value;
        return $this;
    }
}
