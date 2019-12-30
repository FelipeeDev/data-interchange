<?php namespace FelipeeDev\DataInterchange\Mappers\Types;

use FelipeeDev\DataInterchange\Mappers\Type;
use FelipeeDev\DataInterchange\Record;

class Simple implements Type
{
    /** @var string */
    private $inputKey;

    /** @var string */
    private $outputKey;

    /**  @var bool */
    private $override;

    public function __construct(string $inputKey, string $outputKey, bool $override = true)
    {
        $this->inputKey = $inputKey;
        $this->outputKey = $outputKey;
        $this->override = $override;
    }

    public function convert(Record $input, Record $result)
    {
        if (!$input->has($this->inputKey)) {
            return;
        }

        if (!$this->override && $result->has($this->outputKey)) {
            return;
        }

        $value = $input->get($this->inputKey);

        $result->set($this->outputKey, $value);
    }
}
