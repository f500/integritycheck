<?php

namespace F500\Integrity\Console;

use F500\Integrity\IntegrityCheck;
use F500\Integrity\Resolution;
use Symfony\Component\Console\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Container;

abstract class SymfonyConsoleIntegrityCheckBase extends ContainerAwareCommand
{
    static $message     = 'The base command cannot be run directly';
    static $resolved    = 'This command cannot resolve';
    static $name        = 'base-does-nothing';
    static $description = 'Extend this base command for new integrity checks';
    static $resolvable  = false;
    static $service     = 'service.name.in.the.di.container';

    protected function configure()
    {
        $this
            ->setName(static::$name)
            ->setDescription(static::$description);

        if (static::$resolvable) {
            $this->addOption('resolve', 'r', InputOption::VALUE_NONE, 'Perform resolution attempt');
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Container $container */
        $container = $this->getContainer();

        /** @var IntegrityCheck $checker */
        $checker = $container->get(static::$service);

        $this->investigate($checker, $output);

        if ($input->hasOption('resolve') && $input->getOption('resolve')) {
            $this->resolve($checker, $output);
        }
    }

    /**
     * @param IntegrityCheck $checker
     * @param OutputInterface $output
     */
    protected function investigate(IntegrityCheck $checker, OutputInterface $output) {

        $result  = $checker->investigate();
        if ($result->hasErrors()) {
            $output->writeln(
                sprintf('<error>' . static::$message . '</error>', $result->count())
            );

            foreach ($result->allErrors() as $error) {
                $output->writeln(
                    '<error>' . $error . '</error>',
                    OutputInterface::VERBOSITY_VERY_VERBOSE
                );
            }
        } else {
            $output->writeln(
                sprintf(static::$message, 'OK'),
                OutputInterface::VERBOSITY_VERBOSE
            );
        }
    }

    /**
     * @param IntegrityCheck $checker
     * @param OutputInterface $output
     */
    protected function resolve(IntegrityCheck $checker, OutputInterface $output)
    {
        $result = $checker->resolve();

        $tag = $result->wasSuccessful() ? 'info' : 'error';
        $output->writeln(
            "<$tag>" . $result->getMessage() . "</$tag>"
        );
    }

}
