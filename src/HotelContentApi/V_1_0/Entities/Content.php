<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class Content
{
    /** @var null|string */
    protected $content;

    /** @var null|string */
    protected $language_code;

    public function __construct(array $data = [])
    {
        $this->content = $data['content'] ?? null;
        $this->language_code = $data['languageCode'] ?? null;
    }

    public function getContent() : ?string
    {
        return $this->content;
    }

    public function getLanguageCode() : ?string
    {
        return $this->language_code;
    }
}
