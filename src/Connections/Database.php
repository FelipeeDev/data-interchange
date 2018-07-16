<?php namespace FelipeeDev\DataInterchange\Connections;

class Database
{
    /**
     * @var string
     */
    private $driver;
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var array
     */
    private $options;

    public function __construct(string $driver, string $host, string $username, string $password, array $options = [])
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }
}