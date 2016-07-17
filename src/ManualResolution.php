<?php

namespace F500\Integrity;

class ManualResolution implements Resolution
{
    /**
     * @var string
     */
    private $instructions;

    /**
     * @param string $instructions
     */
    public function __construct($instructions)
    {
        $this->instructions = $instructions;
    }

    /**
     * Contains the information to indicate what manual steps to perform to resolve an integrity violation
     * @return string
     */
    public function getMessage()
    {
        return $this->instructions;
    }

    /**
     * A ManualResolution is always successful
     * @return bool
     */
    public function wasSuccessful()
    {
        return true;
    }
}
