<?php

namespace Core\Shared\Application\Command;

interface CommandHandler
{
    public function __invoke(Command $command);
}