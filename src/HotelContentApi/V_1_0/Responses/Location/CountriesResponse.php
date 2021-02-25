<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Location;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\AuditData;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Country;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Error;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\BaseResponse;

class CountriesResponse extends BaseResponse
{
    /** @var null|AuditData */
    protected $audit_data;

    /** @var Country[] */
    protected $countries = [];

    /** @var null|Error */
    protected $error;

    /** @var null|int */
    protected $from;

    /** @var null|int */
    protected $to;

    /** @var null|int */
    protected $total;

    public function __construct(array $data = [])
    {
        if (isset($data['auditData']) && is_array($data['auditData'])) {
            $this->audit_data = new AuditData($data['auditData']);
        }

        if (isset($data['countries']) && is_array($data['countries'])) {
            foreach ($data['countries'] as $country) {
                $this->countries[] = new Country($country);
            }
        }

        if (isset($data['error']) && is_array($data['error'])) {
            $this->error = new Error($data['error']);
        }

        $this->from = $data['from'] ?? null;
        $this->to = $data['to'] ?? null;
        $this->total = $data['total'] ?? null;
    }

    public function getAuditData() : ?AuditData
    {
        return $this->audit_data;
    }

    /**
     * @return Country[]
     */
    public function getCountries() : array
    {
        return $this->countries;
    }

    public function getError() : ?Error
    {
        return $this->error;
    }

    public function setError(Error $value)
    {
        $this->error = $value;
        return $this;
    }

    public function getFrom() : ?int
    {
        return $this->from;
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
