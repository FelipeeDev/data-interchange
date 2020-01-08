<?php namespace FelipeeDev\DataInterchange\Input\Transfer;

use FelipeeDev\DataInterchange\Data\DataHandler;
use FelipeeDev\DataInterchange\Input\Transfer;
use FelipeeDev\DataInterchange\Connections\Ftp as FtpConnection;
use FelipeeDev\DataInterchange\Options\Options;

class Ftp implements Transfer
{
    /** @var string */
    private $host;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $sourcePath;

    /** @var Options */
    private $options;

    /** @var string */
    private $dataType = DataHandler::TYPE_STRING;

    public function __construct(string $host, string $username, string $password, string $sourcePath, array $options = [])
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->sourcePath = $sourcePath;
        $this->options = Options::make($options);
    }

    public function setDataType(string $dataType): Ftp
    {
        $this->dataType = $dataType;

        return $this;
    }

    public function persist(string $destination)
    {
        ftp_get($this->connect(), $destination, $this->sourcePath, $this->options->find('mode', FTP_BINARY));
    }

    public function data(): DataHandler
    {
        return new DataHandler($this->dataType, function () {
            return ftp_get(
                $this->connect(),
                'php://memory',
                $this->sourcePath,
                $this->options->find('mode', FTP_BINARY)
            );
        });
    }

    private function connect()
    {
        $connection = new FtpConnection($this->host, $this->username, $this->password, $this->options);

        return $connection->connect();
    }
}
