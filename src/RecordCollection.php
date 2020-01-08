<?php namespace FelipeeDev\DataInterchange;

class RecordCollection implements \IteratorAggregate
{
    /** @var Record[] */
    private $records = [];

    public function __construct(array $records = null)
    {
        if (empty($records)) {
            return;
        }

        $this->setRecords(...$records);
    }

    public function all(): array
    {
        return $this->records;
    }

    public function getIterator()
    {
        return $this->records;
    }

    public function merge(RecordCollection $recordCollection): RecordCollection
    {
        new static(array_merge($this->records, $recordCollection->all()));
    }

    private function setRecords(Record ...$records)
    {
        $this->records = $records;
    }

    public function mergeMany(DataHandler $execute)
    {

    }
}
