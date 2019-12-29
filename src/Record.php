<?php namespace FelipeeDev\DataInterchange;

class Record
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    final public function get(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }
}
