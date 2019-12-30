<?php namespace FelipeeDev\DataInterchange\Mappers;

use FelipeeDev\DataInterchange\Record;

class Rule
{
    /** @var Type */
    private $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function convert(Record $record, Record $result)
    {
        $this->type->convert($record, $result);
    }
}
