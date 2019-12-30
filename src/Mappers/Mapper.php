<?php namespace FelipeeDev\DataInterchange\Mappers;

use FelipeeDev\DataInterchange\Record;

class Mapper
{
    /** @var Rules */
    private $rules;

    final public function __construct(Rules $rules)
    {
        $this->rules = $rules;
    }

    final public function map(Record $record): Record
    {
        $result = new Record;

        foreach ($this->rules as $rule) {
            $rule->convert($record, $result);
        }

        return $result;
    }
}
