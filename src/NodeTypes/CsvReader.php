<?php namespace FelipeeDev\DataInterchange\NodeTypes;

use FelipeeDev\DataInterchange\Node;
use FelipeeDev\DataInterchange\DataHandler;

class CsvReader implements NodeType
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

    public function extract(): DataHandler
    {

    }
}
