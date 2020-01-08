<?php namespace FelipeeDev\DataInterchange\Input;

class Input
{
    /** @var bool */
    private $iterable;

    /** @var Channel[] */
    private $channels = [];

    /** @var LocalWriter */
    private $localWriter;

    public function __construct(LocalWriter $localWriter)
    {
        $this->localWriter = $localWriter;
    }

    final public function pushChannel(Channel $channel)
    {
        $this->channels[] = $channel;
    }

    final public function handle()
    {
        foreach ($this->channels as $channel) {
            if ($channel->isPersistTemporary()) {
                $this->localWriter->persist($channel);
            }
        }

        return new StreamHandler($this->channels);
    }
}
