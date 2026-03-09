<?php

/**
 * FOSSBilling.
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license   Apache-2.0
 *
 * Copyright FOSSBilling 2022
 * This software may contain code previously used in the BoxBilling project.
 * Copyright BoxBilling, Inc 2011-2021
 *
 * This source file is subject to the Apache-2.0 License that is bundled
 * with this source code in the file LICENSE
 */

namespace Box\Mod\Example\Commands;

use Pimple\Container;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'example:error',
    description: 'Return an error message',
    hidden: false
)]
class ExampleError extends Command implements \FOSSBilling\InjectionAwareInterface
{
    protected ?Container $di = null;

    /**
     * @param  Container  $di
     * @return void
     */
    public function setDi(Container $di): void
    {
        $this->di = $di;
    }

    /**
     * @return Container|null
     */
    public function getDi(): ?Container
    {
        return $this->di;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $output->writeln('<error>This is your example error console</error>');
        } catch (\Exception $e) {
            $output->writeln('<error>This is your example error console triggered by an exception</error>');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}