<?php namespace FelipeeDev\DataInterchange\Input\Extractors;

use FelipeeDev\DataInterchange\Input\Channel;
use FelipeeDev\DataInterchange\Input\Extractor;
use FelipeeDev\DataInterchange\Input\Extractors\Exceptions\CsvFileNotFound;

class Csv implements Extractor
{
    const DEFAULT_LENGTH = 0;

    /** @var string  */
    private $delimiter;

    /** @var string  */
    private $newLineDelimiter;

    public function __construct(
        string $delimiter = ',',
        string $newLineDelimiter = "\n")
    {
        $this->delimiter = $delimiter;
        $this->newLineDelimiter = $newLineDelimiter;
    }

    public function extract(Channel $channel): \Generator
    {
        if ($channel->isPersistTemporary()) {
            while($line = fgetcsv($this->getFileHandler($channel), static::DEFAULT_LENGTH, $this->delimiter)) {
                yield $line;
            }

            return;
        }

        $channel->makeDataHandler()->handle(function (string $data) {
            foreach (str_getcsv($data, $this->delimiter) as $record) {
                yield $record;
            }
        });
    }

    private function getFileHandler(Channel $channel)
    {
        $sourcePath = $channel->getSourcePath();

        if (($handle = fopen($sourcePath, 'r')) === false) {
            throw new CsvFileNotFound;
        }

        return $handle;
    }
}
