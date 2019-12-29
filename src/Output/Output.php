<?php namespace FelipeeDev\DataInterchange\Output;

use FelipeeDev\DataInterchange\DataHandler;

class Output
{
    /** @var Channel[] */
    private $channels = [];

    final public function pushChannel(Channel $channel)
    {
        $this->channels[] = $channel;
    }

    final public function proceed(DataHandler $dataHandler)
    {
        foreach ($this->channels as $channel) {
            $this->proceedChannel($dataHandler, $channel->getChannelType(), $channel->getDescriptor());
        }
    }

    private function proceedChannel(DataHandler $dataHandler, ChannelType $channelType, Descriptor $descriptor)
    {


    }
}
