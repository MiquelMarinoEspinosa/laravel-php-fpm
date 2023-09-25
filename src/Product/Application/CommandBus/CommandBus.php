<?php

declare(strict_types=1);

namespace Core\Product\Application\CommandBus;

use Core\Product\Application\Command\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}