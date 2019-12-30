<?php namespace FelipeeDev\DataInterchange\Mappers\Types;

use FelipeeDev\DataInterchange\Mappers\Type;
use FelipeeDev\DataInterchange\Record;

class Split implements Type
{
    /** @var string */
    private $inputKey;

    /** @var string[] */
    private $outputKeys;

    /** @var string */
    private $delimiter;

    /**  @var bool */
    private $override;

    public function __construct(string $inputKey, array $outputKeys, string $delimiter = ' ', bool $override = true)
    {
        $this->inputKey = $inputKey;
        $this->outputKeys = $outputKeys;
        $this->delimiter = $delimiter;
        $this->override = $override;
    }

    public function convert(Record $input, Record $result)
    {
        if (!$input->has($this->inputKey)) {
            return;
        }

        $values = explode($this->delimiter, $input->get($this->inputKey), count($this->outputKeys));

        foreach ($values as $value) {
            $outputKey = array_shift($this->outputKeys);
            if (!$this->override && $result->has($outputKey)) {
                continue;
            }

            $result->set($outputKey, $value);
        }
    }
}