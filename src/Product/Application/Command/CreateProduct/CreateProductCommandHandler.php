<?php

namespace Core\Product\Application\Command\CreateProduct;

use Core\Product\Application\Command\Command;
use Core\Product\Application\Command\CommandHandler;

final readonly class CreateProductCommandHandler implements CommandHandler
{
    public function __invoke(Command $command)
    {
        dd($command);
    }
}
