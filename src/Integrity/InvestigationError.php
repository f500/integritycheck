<?php

namespace F500\Integrity;

interface InvestigationError
{
    /**
     * @return mixed
     */
    public function getResult();

    /**
     * @return string
     */
    public function __toString();
}
