<?php

namespace Core\Product\Application\Command\CreateProduct;

use Core\Shared\Application\Command\Command;
use Core\Shared\Application\Command\CommandHandler;

final readonly class CreateProductCommandHandler implements CommandHandler
{
    public function __invoke(Command $command)
    {
        dd($command);
    }
}
