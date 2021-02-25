<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities;

class AuditData
{
    /** @var null|string */
    protected $environment;

    /** @var null|string */
    protected $process_time;

    /** @var null|string */
    protected $release;

    /** @var null|string */
    protected $request_host;

    /** @var null|string */
    protected $server_id;

    /** @var null|string */
    protected $timestamp;

    public function __construct(array $data = [])
    {
        $this->environment = $data['environment'] ?? null;
        $this->process_time = $data['processTime'] ?? null;
        $this->release = $data['release'] ?? null;
        $this->request_host = $data['requestHost'] ?? null;
        $this->server_id = $data['serverId'] ?? null;
        $this->timestamp = $data['timestamp'] ?? null;
    }

    public function getEnvironment() : ?string
    {
        return $this->environment;
    }

    public function setEnvironment(?string $value)
    {
        $this->environment = $value;
        return $this;
    }

    public function getProcessTime() : ?string
    {
        return $this->process_time;
    }

    public function setProcessTime(?string $value)
    {
        $this->process_time = $value;
        return $this;
    }

    public function getRelease() : ?string
    {
        return $this->release;
    }

    public function setRelease(?string $value)
    {
        $this->release = $value;
        return $this;
    }

    public function getRequestHost() : ?string
    {
        return $this->request_host;
    }

    public function setRequestHost(?string $value)
    {
        $this->request_host = $value;
        return $this;
    }

    public function getServerId() : ?string
    {
        return $this->server_id;
    }

    public function setServerId(?string $value)
    {
        $this->server_id = $value;
        return $this;
    }

    public function getTimestamp() : ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(?string $value)
    {
        $this->timestamp = $value;
        return $this;
    }
}
