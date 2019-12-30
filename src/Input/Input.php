<?php namespace FelipeeDev\DataInterchange\Input;

class Input
{
    /** @var bool */
    private $iterable;

    /** @var Channel[] */
    private $channels = [];

    public function __construct(bool $iterable)
    {
        $this->iterable = $iterable;
    }

    final public function pushChannel(Channel $channel)
    {
        $this->channels[] = $channel;
    }
}
