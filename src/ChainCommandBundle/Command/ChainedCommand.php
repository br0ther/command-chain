<?php

namespace ChainCommandBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ChainedCommand
 * @package ChainCommandBundle\Command
 */
abstract class ChainedCommand extends ContainerAwareCommand
{
    /**
     * @var
     */
    private $message;

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

        if ($this->getApplication()) {
            $chainCommand = $this->getContainer()->get('chain_command.command_chaining');
            $logger = $this->getContainer()->get('logger');

            if ($ownerName = $chainCommand->getOwnerNameForCommand($this->getName())) {
                $err = sprintf(
                    'Error: %s command is a member of %s command chain and cannot be executed on its own.',
                    $this->getName(),
                    $ownerName
                );
                return $output->writeln($err);

            } else {
                $logger->addNotice(sprintf(
                    '%s is a master command of a command chain that has registered member commands',
                    $this->getName()
                ));
                $logger->addNotice(sprintf('Executing %s command itself first:', $this->getName()));
            }
        }
        $output->writeln($this->message);

        if ($this->getApplication()) {
            $logger->addNotice($this->message);

            if ($commands = $chainCommand->getCommandsForOwner($this->getName())) {
                $logger->addNotice(sprintf('Executing %s chain members:',$this->getName()));

                // run chain registered commands for owner
                foreach ($commands as $command) {
                    $command->execute($input, $output);
                }
                $logger->addNotice(sprintf('Execution of %s chain completed.',$this->getName()));
            }
        }
    }
}
