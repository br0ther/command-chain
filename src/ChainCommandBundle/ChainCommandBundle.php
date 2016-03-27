<?php

namespace ChainCommandBundle;

use ChainCommandBundle\DependencyInjection\Compiler\ChainCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ChainCommandBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ChainCompilerPass());
    }
}
