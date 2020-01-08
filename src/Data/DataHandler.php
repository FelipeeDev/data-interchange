<?php namespace FelipeeDev\DataInterchange\Data;

use FelipeeDev\DataInterchange\RecordCollection;

class DataHandler
{
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_BINARY = 'binary';

    /** @var string */
    private $type;

    /** @var callable */
    private $handler;

    public function __construct(string $type, callable  $handler)
    {
        $this->type = $type;
        $this->handler = $handler;
    }

    public function handle(callable $handler)
    {
        switch ($this->type) {
            case static::TYPE_STRING:
                $handler(($this->handler)());
                break;
            case static::TYPE_ARRAY:
                foreach (($this->handler)() as $data) {
                    $handler($data);
                }
                break;
            case static::TYPE_BINARY:
                //todo:
                break;
            default:
                $handler(($this->handler)());
        }
    }
}
