<?php namespace FelipeeDev\DataInterchange\Input\Transfer;

use FelipeeDev\DataInterchange\Data\DataHandler;
use FelipeeDev\DataInterchange\Input\Transfer;

class Internal implements Transfer
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function persist(string $destination)
    {
        file_put_contents($destination, $this->data());
    }

    public function data(): DataHandler
    {
        return new DataHandler(DataHandler::TYPE_ARRAY, function () {
            return $this->data;
        });
    }
}
