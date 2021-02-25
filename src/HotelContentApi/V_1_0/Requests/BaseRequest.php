<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests;

class BaseRequest
{
    const ACCEPT_APPLICATION_JSON = 'application/json';

    const CONTENT_TYPE_APPLICATION_JSON = 'application/json';

    /** @var null|string */
    protected $accept;

    protected $accept_encoding = 'gzip';

    /** @var null|string */
    protected $api_key;

    /** @var null|string */
    protected $content_type;

    /** @var null|string */
    protected $secret;

    public function getAccept() : ?string
    {
        return $this->accept;
    }

    public function setAccept(?string $value)
    {
        $this->accept = $value;
        return $this;
    }

    public function getAcceptEncoding() : ?string
    {
        return $this->accept_encoding;
    }

    public function setAcceptEncoding(?string $value)
    {
        $this->accept_encoding = $value;
        return $this;
    }

    public function getApiKey() : ?string
    {
        return $this->api_key;
    }

    public function setApiKey(?string $value)
    {
        $this->api_key = $value;
        return $this;
    }

    public function getContentType() : ?string
    {
        return $this->content_type;
    }

    public function setContentType(?string $value)
    {
        $this->content_type = $value;
        return $this;
    }

    public function getSecret() : ?string
    {
        return $this->secret;
    }

    public function setSecret(?string $value)
    {
        $this->secret = $value;
        return $this;
    }

    public function getXSignature() : ?string
    {
        return hash('sha256', $this->api_key.$this->secret.time());
    }
}
