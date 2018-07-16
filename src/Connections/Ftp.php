<?php namespace FelipeeDev\DataInterchange\Connections;

class Ftp
{
    /**
     * @var string
     */
    private $ftp;
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

    public function __construct(string $ftp, string $username, string $password, array $options = [])
    {
        $this->ftp = $ftp;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }
}