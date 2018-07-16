<?php namespace FelipeeDev\DataInterchange;

class DataHandler
{
    /** @var FieldCollection  */
    private $fieldCollection;

    public function __construct(FieldCollection $fieldCollection, Node $node)
    {
        $this->fieldCollection = $fieldCollection;
    }

    public function getFields(): FieldCollection
    {
        return $this->fieldCollection;
    }

    public function nextRecord()
    {

    }

    public function hasNextRecord()
    {

    }
}
