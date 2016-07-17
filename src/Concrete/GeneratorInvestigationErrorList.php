<?php

namespace F500\Integrity\Concrete;

final class GeneratorInvestigationErrorList
{
    /**
     * @var array
     */
    private $result;

    /**
     * @param array $investigationResult
     */
    public function __construct(array $investigationResult)
    {
        $this->result = $investigationResult;
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
