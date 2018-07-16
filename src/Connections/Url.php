<?php namespace FelipeeDev\DataInterchange\Connections;

class Url
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $webMethod;
    /**
     * @var array
     */
    private $headers;
    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $url, array $parameters = [], string $webMethod = 'GET', array $headers = [])
    {
        $this->url = $url;
        $this->webMethod = $webMethod;
        $this->headers = $headers;
        $this->parameters = $parameters;
    }
}
