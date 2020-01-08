<?php namespace FelipeeDev\DataInterchange\Input;

use FelipeeDev\DataInterchange\Data\DataHandler;

class Channel
{
    /** @var Transfer */
    private $transfer;

    /** @var Extractor */
    private $extractor;

    /** @var string|null */
    private $sourcePath = null;

    /** @var bool */
    private $persistTemporary = false;

    public function __construct(Transfer $transfer, Extractor $extractor)
    {
        $this->transfer = $transfer;
        $this->extractor = $extractor;
    }

    public function getTransfer(): Transfer
    {
        return $this->transfer;
    }

    public function getExtractor(): Extractor
    {
        return $this->extractor;
    }

    public function makeDataHandler(): DataHandler
    {
        return $this->transfer->data();
    }

    public function setSourcePath(string $sourcePath): Channel
    {
        $this->sourcePath = $sourcePath;

        return $this;
    }

    public function getSourcePath(): ?string
    {
        return $this->sourcePath;
    }

    public function setPersistTemporary(bool $persistTemporary): Channel
    {
        $this->persistTemporary = $persistTemporary;

        return $this;
    }

    public function isPersistTemporary(): bool
    {
        return $this->persistTemporary;
    }
}
