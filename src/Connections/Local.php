<?php namespace FelipeeDev\DataInterchange\Connections;

class Local
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $permissions;
    /**
     * @var array
     */
    private $options;

    public function __construct(string $path, string $permissions, array $options = [])
    {
        $this->path = $path;
        $this->permissions = $permissions;
        $this->options = $options;
    }
}