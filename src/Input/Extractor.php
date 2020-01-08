<?php namespace FelipeeDev\DataInterchange\Input;

use FelipeeDev\DataInterchange\DataHandler;

interface Extractor
{
    public function extract(Channel $channel): \Generator;
}
