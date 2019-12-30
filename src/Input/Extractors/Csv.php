<?php namespace FelipeeDev\DataInterchange\Input\Extractors;

use FelipeeDev\DataInterchange\DataHandler;
use FelipeeDev\DataInterchange\Input\Channel;
use FelipeeDev\DataInterchange\Input\Extractor;

class Csv implements Extractor
{
    /** @var string  */
    private $delimiter;

    /** @var string  */
    private $newLineDelimiter;

    /** @var string  */
    private $path;

    public function __construct(
        string $path,
        string $delimiter = ',',
        string $newLineDelimiter = "\n")
    {
        $this->delimiter = $delimiter;
        $this->newLineDelimiter = $newLineDelimiter;
        $this->path = $path;
    }

    public function extract(Channel $channel): DataHandler
    {

    }
}
