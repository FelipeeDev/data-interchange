<?php namespace FelipeeDev\DataInterchange\Output;

class Channel
{
    /** @var ChannelType */
    private $channelType;

    /** @var Descriptor */
    private $descriptor;

    public function __construct(ChannelType $channelType, Descriptor $descriptor)
    {
        $this->channelType = $channelType;
        $this->descriptor = $descriptor;
    }

    public function getChannelType(): ChannelType
    {
        return $this->channelType;
    }

    public function getDescriptor(): Descriptor
    {
        return $this->descriptor;
    }
}
