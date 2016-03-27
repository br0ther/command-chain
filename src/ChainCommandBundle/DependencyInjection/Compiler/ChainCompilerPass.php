<?php

namespace ChainCommandBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ChainCompilerPass
 * @package ChainCommandBundle\DependencyInjection\Compiler
 */
class ChainCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('chain_command.command_chaining')) {
            return;
        }

        $definition = $container->findDefinition(
            'chain_command.command_chaining'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'command.chain'
        );

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                if (isset($attributes["owner"])) {
                    $definition->addMethodCall(
                        'addCommand',
                        array(new Reference($id), $attributes["owner"])
                    );
                }
            }
        }
    }
}
