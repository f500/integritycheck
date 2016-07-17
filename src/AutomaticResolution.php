<?php

namespace F500\Integrity;

class AutomaticResolution implements Resolution
{
    /**
     * @var string
     */
    private $result;

    /**
     * @var bool
     */
    private $successful;

    /**
     * @param bool $successful
     * @param mixed $result
     */
    public function __construct($successful, $result)
    {
        $this->result = $result;
        $this->successful = $successful;
    }

    /**
     * Contains the information which should be conveyed by the outcome of the resolve method
     * @return string
     */
    public function getMessage()
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function wasSuccessful()
    {
        return $this->successful;
    }
}
