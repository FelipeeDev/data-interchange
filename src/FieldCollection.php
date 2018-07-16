<?php namespace FelipeeDev\DataInterchange;

class FieldCollection implements \IteratorAggregate
{
    /** @var Field[] */
    private $fields;

    public function __construct(array $fields)
    {
        $this->setFields(...$fields);
    }

    public function merge(FieldCollection $fieldCollection): FieldCollection
    {
        return new static(array_merge($this->toArray(), $fieldCollection->toArray()));
    }

    public function toArray(): array
    {
        return $this->fields;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->fields);
    }

    public function onlyKeys(array $keys): FieldCollection
    {
        return new static(array_intersect_key($this->fields, array_flip($keys)));
    }

    private function setFields(Field ...$fields)
    {
        $this->fields = $fields;
    }
}
