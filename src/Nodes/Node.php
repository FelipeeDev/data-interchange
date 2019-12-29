<?php namespace FelipeeDev\DataInterchange\Nodes;

class Node
{
    /** @var Connection  */
    private $connection;

    /** @var NodeEngine  */
    private $nodeEngine;

    /** @var FieldCollection */
    private $inputFields = null;

    /** @var array */
    private $acceptedFields = [];

    /** @var array */
    private $filterOutput = [];

    public function __construct(
        NodeEngine $nodeEngine,
        Connection $connection
    ) {
        $this->connection = $connection;
        $this->nodeEngine = $nodeEngine;
    }

    public function acceptedFields(array $fields)
    {
        $this->acceptedFields = $fields;
    }

    public function filterOutput(array $fields)
    {
        $this->filterOutput = $fields;
    }

    public function getInputFields(): FieldCollection
    {
        if (is_null($this->inputFields)) {
            $this->prepareInputFields();
        }
        return $this->inputFields;
    }

    private function prepareInputFields()
    {
        $fields = $this->nodeEngine->getInputFields();
        $this->inputFields = empty($this->acceptedFields) ? $fields : $fields->onlyKeys($this->acceptedFields);
    }
}
