<?php

namespace Core\Shared\Infrastructure\CommandBus;

use Core\Product\Application\Command\CreateProduct\CreateProductCommand;
use Core\Product\Application\Command\CreateProduct\CreateProductCommandHandler;
use Core\Shared\Application\Command\Command;
use Core\Shared\Application\CommandBus\CommandBus;

final class CoreCommandBus implements CommandBus
{
    private array $handlers;

    public function __construct(
        private CreateProductCommandHandler $createProductCommandHandler
    ) {
        $this->handlers[CreateProductCommand::class] = $this->createProductCommandHandler;
    }

    public function dispatch(Command $command): void
    {
        ($this->handlers[$command::class])($command);
    }
}
