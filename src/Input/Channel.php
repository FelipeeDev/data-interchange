<?php namespace FelipeeDev\DataInterchange\Input;

use FelipeeDev\DataInterchange\Output\ChannelType;

class Channel
{
    /** @var ChannelType */
    private $channelType;

    /** @var Extractor */
    private $extractor;

    public function __construct(ChannelType $channelType, Extractor $extractor)
    {
        $this->channelType = $channelType;
        $this->extractor = $extractor;
    }
}
