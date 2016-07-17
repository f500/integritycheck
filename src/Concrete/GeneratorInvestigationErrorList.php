<?php

namespace F500\Integrity\Concrete;

use Iterator;

final class GeneratorInvestigationErrorList
{
    /**
     * @var array
     */
    private $result;

    /**
     * @param iterator $result
     */
    public function __construct(Iterator $result)
    {
        $this->result = $result;
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return (bool)$this->count();
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->result);
    }

    /**
     * @return \Generator
     */
    public function allErrors()
    {
        foreach ($this->result as $error) {
            yield new JsonEncodingInvestigationError($error);
        }
    }
}
