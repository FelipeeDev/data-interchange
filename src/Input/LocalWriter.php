<?php namespace FelipeeDev\DataInterchange\Input;

class LocalWriter
{
    /** @var string */
    private $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function persist(Channel $channel)
    {
        do {
            $sourcePath = $this->getFilePath();
        } while (file_exists($sourcePath));

        $channel->getTransfer()->persist($sourcePath);

        $channel->setSourcePath($sourcePath);
    }

    private function getFilePath(): string
    {
        return sprintf(
            '%s/%s/%s.tmp',
            $this->directory,
            date('Ymd'),
            md5(date('Y-m-d H:i:s') . rand(0, 999999))
        );
    }
}
