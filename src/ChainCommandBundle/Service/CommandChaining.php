<?php

namespace ChainCommandBundle\Service;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Class CommandChaining
 * @package ChainCommandBundle\Service
 */
class CommandChaining
{
    /**
     * @var array
     */
    private $commands;

    /**
     * CommandChaining constructor.
     */
    public function __construct()
    {
        $this->commands = array();
    }

    /**
     * @param ContainerAwareCommand $command
     * @param $owner
     */
    public function addCommand(ContainerAwareCommand $command, $owner)
    {
        $this->commands[$owner][] = $command;
    }

    /**
     * @param $owner
     * @return mixed
     */
    public function getCommandsForOwner($owner)
    {
        if (array_key_exists($owner, $this->commands)) {
            return $this->commands[$owner];
        }
    }

    /**
     * @param $commandName
     * @return int|string
     */
    public function getOwnerNameForCommand($commandName)
    {
        foreach ($this->commands as $ownerName => $ownerCommands) {
            foreach ($ownerCommands as $command) {
                if ($commandName == $command->getName()) {

                    return $ownerName;
                }
            }
        }

        return '';
    }
}
