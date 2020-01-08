<?php namespace FelipeeDev\DataInterchange\Nodes;

use FelipeeDev\DataInterchange\Input\Input;
use FelipeeDev\DataInterchange\Mappers\Mapper;
use FelipeeDev\DataInterchange\Output\Output;

class Node
{
    /** @var Input */
    private $input;
    /** @var Output */
    private $output;
    /** @var Mapper */
    private $mapper;

    public function __construct(Input $input, Output $output, Mapper $mapper)
    {
        $this->input = $input;
        $this->output = $output;
        $this->mapper = $mapper;
    }

    public function proceed()
    {
        $inputHandler = $this->input->handle();


    }
}
