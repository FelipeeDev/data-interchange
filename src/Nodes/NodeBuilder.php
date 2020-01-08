<?php namespace FelipeeDev\DataInterchange\Nodes;

use FelipeeDev\DataInterchange\Input\Channel as InputChannel;
use FelipeeDev\DataInterchange\Input\Input;
use FelipeeDev\DataInterchange\Output\Channel as OutputChannel;
use FelipeeDev\DataInterchange\Output\Output;

class NodeBuilder
{
    /** @var Input */
    private $input;

    /** @var Output */
    private $output;

    /** @var Mapper */
    private $mapper;

    public function __construct(Input $input, Output $output, $mapper)
    {
        $this->input = $input;
        $this->output = $output;
        $this->mapper = $mapper;
    }

    public function pushInputChannel(InputChannel $inputChannel)
    {
        $this->input->pushChannel($inputChannel);
    }

    public function pushOutputChannel(OutputChannel $outputChannel)
    {
        $this->output->pushChannel($outputChannel);
    }

    public function build(): Node
    {
        return new Node(

        );
    }
}
