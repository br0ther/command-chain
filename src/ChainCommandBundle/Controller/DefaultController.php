<?php

namespace ChainCommandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // replace this example code with whatever you need
        $commands = $this->get('chain_command.command_chaining')->getCommandsForOwner('foo:hello');
//
//        foreach ($commands as $command) {
//            var_dump($command);
//        }

        return $this->render('ChainCommandBundle:Default:index.html.twig');
    }
}
