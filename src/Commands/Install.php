<?php

namespace ajiho\IlluminateDatabase\Commands;

use ajiho\IlluminateDatabase\Command;
use think\console\Input;
use think\console\input\Option;
use think\console\Output;

class Install extends Command
{
    protected function configure()
    {
        $this->setName('idb:migrate:install')
            ->addOption('database', null, Option::VALUE_OPTIONAL, 'The database connection to use')
            ->setDescription('Create the migration repository');
    }

    protected function execute(Input $input, Output $output)
    {

        //参数准备
        $arguments = [];
        if ($input->hasOption('database')) {
            $arguments += ['--database' => $input->getOption('database')];
        }

        return $this->laravel->runCommand('migrate:install', $arguments, true);

    }
}
