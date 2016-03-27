<?php

namespace FooBundle\Command;

use ChainCommandBundle\Command\ChainedCommand;

/**
 * Class FooHelloCommand
 * @package FooBundle\Command
 */
class FooHelloCommand extends ChainedCommand
{
    /**
     * @var string
     */
    private $message = 'Hello from Foo!';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('foo:hello');
        $this->setMessage($this->message);
    }
}
