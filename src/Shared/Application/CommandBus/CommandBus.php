<?php

namespace Core\Shared\Application\CommandBus;

use Core\Shared\Application\Command\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}