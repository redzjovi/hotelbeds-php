<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Type;

use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\AuditData;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Error;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Entities\Language;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\BaseResponse;

class LanguagesResponse extends BaseResponse
{
    /** @var null|AuditData */
    protected $audit_data;

    /** @var null|Error */
    protected $error;

    /** @var null|int */
    protected $from;

    /** @var Language[] */
    protected $languages = [];

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
        
        if (isset($data['languages']) && is_array($data['languages'])) {
            foreach ($data['languages'] as $language) {
                $this->languages[] = new Language($language);
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
     * @return Language[]
     */
    public function getLanguages() : array
    {
        return $this->languages;
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
