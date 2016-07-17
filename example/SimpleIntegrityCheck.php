<?php

use F500\Integrity\Concrete\GeneratorInvestigationErrorList;
use F500\Integrity\IntegrityCheck;
use F500\Integrity\ResolutionNotImplemented;

final class SimpleIntegrityCheck implements IntegrityCheck
{
    public function investigate()
    {
        return new GeneratorInvestigationErrorList([
            __FILE__,
            basename(__FILE__),
            __DIR__
        ]);
    }

    public function resolve()
    {
        return new ResolutionNotImplemented();
    }
}
