<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\BaseRequest;

class BoardsRequest extends BaseRequest
{
    /** @var null|string */
    protected $codes;

    /** @var string */
    protected $fields = 'all';

    /** @var null|string */
    protected $language;

    /** @var int */
    protected $from = 1;

    /** @var int */
    protected $to = 100;

    /** @var bool */
    protected $use_secondary_language = true;

    /** @var null|string "2020-03-03" */
    protected $last_update_time;

    public function getCodes() : string
    {
        return $this->codes;
    }

    public function setCodes(string $value)
    {
        $this->codes = $value;
        return $this;
    }

    public function getFields() : string
    {
        return $this->fields;
    }

    public function setFields(string $value)
    {
        $this->fields = $value;
        return $this;
    }

    public function getLanguage() : ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $value)
    {
        $this->language = $value;
        return $this;
    }

    public function getFrom() : int
    {
        return $this->from;
    }

    public function setFrom(int $value)
    {
        $this->from = $value;
        return $this;
    }

    public function getTo() : int
    {
        return $this->to;
    }

    public function setTo(int $value)
    {
        $this->to = $value;
        return $this;
    }

    public function getUseSecondaryLanguage() : bool
    {
        return $this->use_secondary_language;
    }

    public function setUseSecondaryLanguage(bool $value)
    {
        $this->use_secondary_language = $value;
        return $this;
    }

    public function getLastUpdateTime() : ?string
    {
        return $this->last_update_time;
    }

    public function setLastUpdateTime(?string $value)
    {
        $this->last_update_time = $value;
        return $this;
    }

    public function toArray() : array
    {
        $data['codes'] = $this->codes;
        $data['fields'] = $this->fields;

        if ($this->language) {
            $data['language'] = $this->language;
        }

        $data['from'] = $this->from;
        $data['to'] = $this->to;
        $data['useSecondaryLanguage'] = $this->use_secondary_language ? 'true' : 'false';

        if ($this->last_update_time) {
            $data['lastUpdateTime'] = $this->last_update_time;
        }

        return $data;
    }
}
