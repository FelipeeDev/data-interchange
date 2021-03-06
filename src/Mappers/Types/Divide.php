<?php namespace FelipeeDev\DataInterchange\Mappers\Types;

use FelipeeDev\DataInterchange\Mappers\Type;
use FelipeeDev\DataInterchange\Record;

class Divide implements Type
{
    /** @var string[] */
    private $inputKeys;

    /** @var string */
    private $outputKey;

    /**  @var bool */
    private $override;

    public function __construct(array $inputKeys, string $outputKey, bool $override = true)
    {
        $this->inputKeys = $inputKeys;
        $this->outputKey = $outputKey;
        $this->override = $override;
    }

    public function convert(Record $input, Record $result)
    {
        if (!$this->override && $result->has($this->outputKey)) {
            return;
        }

        $value = 0;

        foreach ($this->inputKeys as $inputKey) {
            if (!$input->has($inputKey)) {
                continue;
            }

            if (!isset($value)) {
                $value = $input->get($inputKey);
                continue;
            }

            $value /= $input->get($inputKey);
        }

        if (!isset($value)) {
            return;
        }

        $result->set($this->outputKey, $value);
    }
}