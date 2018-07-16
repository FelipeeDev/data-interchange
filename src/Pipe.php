<?php namespace FelipeeDev\DataInterchange;

class Pipe
{
    /** @var Node  */
    private $outputNode;

    /** @var Node  */
    private $inputNode;

    /** @var Mapper  */
    private $mapper;

    public function __construct(Node $outputNode, Node $inputNode, Mapper $mapper)
    {
        $this->outputNode = $outputNode;
        $this->inputNode = $inputNode;
        $this->mapper = $mapper;
    }

    public function __invoke()
    {
        $this->execute();
    }

    public function execute()
    {

        $this->inputNode->input($this->outputNode->output());
    }

    /**
     * @return DataHandler
     * @throws NoDataException
     */
    public function output(): DataHandler
    {
        if (!$this->data) {
            throw new NoDataException;
        }
        if (!$this->mapped) {
            $this->mapped = $this->mapper->map($this->data);
            $this->mapped->persist();
        }

        return $this->mapped;
    }
}
