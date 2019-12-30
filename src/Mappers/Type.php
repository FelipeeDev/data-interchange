<?php namespace FelipeeDev\DataInterchange\Mappers;

use FelipeeDev\DataInterchange\Record;

interface Type
{
    public function convert(Record $input, Record $result);
}
