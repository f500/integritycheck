<?php

namespace F500\Integrity;

interface InvestigationErrorList
{
    /**
     * @return bool
     */
    public function hasErrors();

    /**
     * @return int
     */
    public function count();

    /**
     * @return InvestigationError[]
     */
    public function allErrors();
}
