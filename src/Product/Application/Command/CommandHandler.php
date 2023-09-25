<?php

declare(strict_types=1);

namespace Core\Product\Application\Command;

interface CommandHandler
{
    public function __invoke(Command $command);
}