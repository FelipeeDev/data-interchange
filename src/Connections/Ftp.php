<?php namespace FelipeeDev\DataInterchange\Connections;

use FelipeeDev\DataInterchange\Connections\Exceptions\FtpConnectionFailed;
use FelipeeDev\DataInterchange\Options\Options;

class Ftp
{
    const DEFAULT_PORT = 21;
    const DEFAULT_TIMEOUT = 90;

    /** @var string */
    private $host;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var Options */
    private $options;

    public function __construct(string $host, string $username, string $password, Options $options)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

    public function connect()
    {
        $handler = ftp_connect(
            $this->host,
            $this->options->find('port', static::DEFAULT_PORT),
            $this->options->find('timeout', static::DEFAULT_TIMEOUT)
        );
        $loginResult = ftp_login($handler, $this->username, $this->password);

        if ((!$handler) || (!$loginResult)) {
            throw new FtpConnectionFailed(sprintf(
                'FTP connection has failed; Host: %s; Username: %s',
                $this->host,
                $this->username
            ));
        }

        ftp_pasv($handler, (bool) $this->options->find('isPassive', false));

        return $handler;
    }
}