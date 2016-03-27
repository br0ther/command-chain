<?php

namespace BarBundle\Command;

use ChainCommandBundle\Command\ChainedCommand;

/**
 * Class BarHiCommand
 * @package BarBundle\Command
 */
class BarHiCommand extends ChainedCommand
{
    /**
     * @var string
     */
    private $message = 'Hi from Bar!';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('bar:hi');
        $this->setMessage($this->message);
    }
}
