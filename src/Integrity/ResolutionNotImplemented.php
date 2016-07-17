<?php

namespace F500\Integrity;

class ResolutionNotImplemented implements Resolution
{

    /**
     * Contains the information which should be conveyed by the outcome of the resolve method
     * @return string
     */
    public function getMessage()
    {
        return 'A resolution for this check is not implemented';
    }

    /**
     * Since there is no resolution it always returns false
     * @return bool
     */
    public function wasSuccessful()
    {
        return false;
    }
}
