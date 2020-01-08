<?php namespace FelipeeDev\DataInterchange\Input\Transfer;

use FelipeeDev\DataInterchange\Data\DataHandler;
use FelipeeDev\DataInterchange\Input\Transfer;

class Url implements Transfer
{
    const DEFAULT_METHOD = 'GET';

    const DEFAULT_CONTENT_TYPE = 'application/x-www-form-urlencoded';

    /** @var string */
    private $url;

    /** @var string */
    private $method = self::DEFAULT_METHOD;

    private $contentType = self::DEFAULT_CONTENT_TYPE;

    /** @var array */
    private $payload = [];

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function persist(string $destination)
    {
        file_put_contents($destination, $this->getContent());
    }

    public function data(): DataHandler
    {
        return new DataHandler(DataHandler::TYPE_STRING, function () {
            return $this->getContent();
        });
    }

    public function setMethod(string $method): Url
    {
        $this->method = $method;

        return $this;
    }

    public function setContentType(string $contentType): Url
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function setPayload(array $payload): Url
    {
        $this->payload = $payload;

        return $this;
    }

    private function getContent(): string
    {
        if ($this->method === static::DEFAULT_METHOD) {
            return file_get_contents($this->url);
        }

        return file_get_contents($this->url, false, $this->makeContext());
    }

    private function makeContext()
    {
        $http = [
            'method' => $this->method,
            'header'  => sprintf('Content-Type: %s', $this->contentType),
            'content' => $this->payload,
        ];

        $content = http_build_query();

        return stream_context_create(compact('http'));
    }
}
