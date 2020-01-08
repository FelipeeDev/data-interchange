<?php namespace FelipeeDev\DataInterchange\Input\Extractors;

use FelipeeDev\DataInterchange\Input\Channel;
use FelipeeDev\DataInterchange\Input\Extractor;

class Json implements Extractor
{
    public function extract(Channel $channel): \Generator
    {
        if ($channel->isPersistTemporary()) {
            foreach (json_decode(file_get_contents($channel->getSourcePath()), true) as $record) {
                yield $record;
            }
        }

        $channel->makeDataHandler()->handle(function (string $data) {
            foreach (json_decode($data, true) as $record) {
                yield $record;
            }
        });

    }
}
