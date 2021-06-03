<?php

namespace Zadorin\Airtable\Filter;

class Condition
{
    protected string $field;

    protected string $operator;

    /** @var mixed */
    protected $value;

    /**
     * @param string $field
     * @param string $operator
     * @param mixed $value
     */
    public function __construct(string $field, string $operator, $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        if (is_float($this->value) || is_int($this->value)) {
            $value = $this->value;
        } else {
            $value = (string)$this->value;
        }
        
        return sprintf("{%s}%s'%s'", $this->field, $this->operator, $value);
    }
}
