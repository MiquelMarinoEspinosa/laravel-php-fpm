<?php

namespace Core\Product\Application\Command;

interface CommandHandler
{
    public function __invoke(Command $command);
}