<?php

namespace F500\Integrity\Concrete;

use F500\Integrity\InvestigationError;

final class JsonEncodingInvestigationError implements InvestigationError
{
    /**
     * @var array
     */
    private $result;

    /**
     * IntegrityCheckInvestigationError constructor.
     * @param mixed $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function __toString()
    {
        return json_encode($this->result);
    }

}
