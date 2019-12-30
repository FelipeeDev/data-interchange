<?php namespace FelipeeDev\DataInterchange\Mappers;

use FelipeeDev\DataInterchange\Field;

class Rules implements \IteratorAggregate
{
    /** @var Rule[] */
    private $rules;

    public function __construct(array $rules)
    {
        $this->setFields(...$rules);
    }

    public function getIterator()
    {
        return $this->rules;
    }

    private function setFields(Rule ...$rules)
    {
        $this->rules = $rules;
    }
}
