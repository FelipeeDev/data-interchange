<?php namespace FelipeeDev\DataInterchange\Input\Transfer;

use FelipeeDev\DataInterchange\Data\DataHandler;
use FelipeeDev\DataInterchange\Input\Transfer;

class Local implements Transfer
{
    /** @var string */
    private $sourcePath;

    /** @var bool */
    private $move;

    public function __construct(string $sourcePath, bool $move = false)
    {
        $this->sourcePath = $sourcePath;
        $this->move = $move;
    }

    public function persist(string $destination)
    {
        if ($this->move) {
            rename($this->sourcePath, $destination);

            return;
        }

        copy($this->sourcePath, $destination);
    }

    public function data(): DataHandler
    {
        return new DataHandler(DataHandler::TYPE_STRING, function () {
            return file_get_contents($this->sourcePath);
        });
    }
}
