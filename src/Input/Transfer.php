<?php namespace FelipeeDev\DataInterchange\Input;

use FelipeeDev\DataInterchange\Data\DataHandler;

interface Transfer
{
    public function persist(string $destination);

    public function data(): DataHandler;
}
