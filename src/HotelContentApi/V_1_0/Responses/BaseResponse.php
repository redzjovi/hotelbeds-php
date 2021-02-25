<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses;

class BaseResponse
{
    /** @var null|string */
    protected $request_body;

    /** @var null|string */
    protected $request_url;

    /** @var null|string */
    protected $response_body;

    public function getRequestBody() : ?string
    {
        return $this->request_body;
    }

    public function setRequestBody(?string $value)
    {
        $this->request_body = $value;
        return $this;
    }

    public function getRequestUrl() : ?string
    {
        return $this->request_url;
    }

    public function setRequestUrl(?string $value)
    {
        $this->request_url = $value;
        return $this;
    }

    public function getResponseBody() : ?string
    {
        return $this->response_body;
    }

    public function setResponseBody(?string $value)
    {
        $this->response_body = $value;
        return $this;
    }
}