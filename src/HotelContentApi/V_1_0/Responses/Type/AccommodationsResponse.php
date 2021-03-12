<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Type;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Accommodation;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\AuditData;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Error;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\BaseResponse;

class AccommodationsResponse extends BaseResponse
{
    /** @var null|AuditData */
    protected $audit_data;

    /** @var null|Error */
    protected $error;

    /** @var null|int */
    protected $from;

    /** @var Accommodation[] */
    protected $accommodations = [];

    /** @var null|int */
    protected $to;

    /** @var null|int */
    protected $total;

    public function __construct(array $data = [])
    {
        if (isset($data['auditData']) && is_array($data['auditData'])) {
            $this->audit_data = new AuditData($data['auditData']);
        }

        if (isset($data['error']) && is_array($data['error'])) {
            $this->error = new Error($data['error']);
        }

        $this->from = $data['from'] ?? null;
        
        if (isset($data['accommodations']) && is_array($data['accommodations'])) {
            foreach ($data['accommodations'] as $accommodation) {
                $this->accommodations[] = new Accommodation($accommodation);
            }
        }

        $this->to = $data['to'] ?? null;
        $this->total = $data['total'] ?? null;
    }

    public function getAuditData() : ?AuditData
    {
        return $this->audit_data;
    }

    public function getError() : ?Error
    {
        return $this->error;
    }

    public function setError(?Error $value)
    {
        $this->error = $value;
        return $this;
    }

    public function getFrom() : ?int
    {
        return $this->from;
    }

    /**
     * @return Accommodation[]
     */
    public function getAccommodations() : array
    {
        return $this->accommodations;
    }

    public function getTo() : ?int
    {
        return $this->to;
    }

    public function getTotal() : ?int
    {
        return $this->total;
    }
}
