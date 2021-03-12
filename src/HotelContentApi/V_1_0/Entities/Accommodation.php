<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class Accommodation
{
    /** @var null|string */
    protected $code;

    /** @var null|string */
    protected $type_description;

    /** @var null|Content */
    protected $type_multi_description;

    public function __construct(array $data = [])
    {
        $this->code = $data['code'] ?? null;
        $this->type_description = $data['typeDescription'] ?? null;

        if (isset($data['typeMultiDescription']) && is_array($data['typeMultiDescription'])) {
            $this->type_multi_description = new Content($data['typeMultiDescription']);
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

    public function getTypeDescription() : ?string
    {
        return $this->type_description;
    }

    public function setTypeDescription(?string $value)
    {
        $this->type_description = $value;
        return $this;
    }

    public function getTypeMultiDescription() : ?Content
    {
        return $this->type_multi_description;
    }

    public function setTypeMultiDescription(?Content $value)
    {
        $this->type_multi_description = $value;
        return $this;
    }
}
