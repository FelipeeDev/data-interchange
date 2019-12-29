<?php namespace FelipeeDev\DataInterchange\Input;

class SingleInput
{
    /** @var bool */
    private $iterable;

    public function __construct(bool $iterable)
    {
        $this->iterable = $iterable;
    }
}
