<?php namespace FelipeeDev\DataInterchange;

interface NodeEngine
{
    public function getInputFields(): FieldCollection;

    public function getOutputFields(): FieldCollection;

    public function records(int $limit): array;

    public function count(): int;
}
