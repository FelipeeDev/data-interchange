<?php namespace FelipeeDev\DataInterchange\Options;

class Options implements \IteratorAggregate
{
    /** @var Option[] */
    private $options = [];

    public function __construct(array $options)
    {
        $this->setRecords(...$options);
    }

    public static function make(array $options): Options
    {
        $results = [];

        foreach ($options as $key => $option) {
            $results[$key] = new Option($key, $option);
        }

        return static($results);
    }

    public function find(string $key, $default = null)
    {
        return $this->options[$key] ?? $default;
    }

    public function getIterator()
    {
        return $this->options;
    }

    private function setRecords(Option ...$options)
    {
        $this->options = $options;
    }
}
