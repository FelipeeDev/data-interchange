<?php namespace FelipeeDev\DataInterchange\Mappers\Types;

use FelipeeDev\DataInterchange\Mappers\Type;
use FelipeeDev\DataInterchange\Record;

class Concat implements Type
{
    /** @var string[] */
    private $inputKeys;

    /** @var string */
    private $outputKey;

    /** @var string */
    private $glue;

    /**  @var bool */
    private $override;

    public function __construct(array $inputKeys, string $outputKey, string $glue = ' ', bool $override = true)
    {
        $this->inputKeys = $inputKeys;
        $this->outputKey = $outputKey;
        $this->glue = $glue;
        $this->override = $override;
    }

    public function convert(Record $input, Record $result)
    {
        if (!$this->override && $result->has($this->outputKey)) {
            return;
        }

        $value = [];

        foreach ($this->inputKeys as $inputKey) {
            if (!$input->has($inputKey)) {
                continue;
            }

            $value[] = $input->get($inputKey);
        }

        $result->set($this->outputKey, implode($this->glue, $value));
    }
}