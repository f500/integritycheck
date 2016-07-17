<?php

namespace F500\Integrity;

interface Resolution
{
    /**
     * Contains the information which should be conveyed by the outcome of the resolve method
     * @return string
     */
    public function getMessage();

    /**
     * Indicates whether the resolution was completed successfully
     * @return bool
     */
    public function wasSuccessful();
}
