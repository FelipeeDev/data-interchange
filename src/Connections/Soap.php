<?php namespace FelipeeDev\DataInterchange\Connections;

class Soap
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $webMethod;

    public function __construct(string $url, string $webMethod)
    {
        $this->url = $url;
        $this->webMethod = $webMethod;
    }
}