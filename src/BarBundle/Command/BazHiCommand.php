<?php

namespace BarBundle\Command;

use ChainCommandBundle\Command\ChainedCommand;

/**
 * Class BazHiCommand
 * @package BarBundle\Command
 */
class BazHiCommand extends ChainedCommand
{
    /**
     * @var string
     */
    private $message = 'Hi from Baz!';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('baz:hi');
        $this->setMessage($this->message);
    }
}
