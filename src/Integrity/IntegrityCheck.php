<?php

namespace F500\Integrity;

interface IntegrityCheck
{
    /**
     * @return InvestigationErrorList
     */
    public function investigate();

    /**
     * @return Resolution
     */
    public function resolve();

}
