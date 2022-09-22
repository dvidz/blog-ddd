<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Command;

use App\Shared\Domain\Command\Command;
use App\Shared\Domain\Command\CommandBus;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class CreateBlogPostCommandBus.
 */
class CreateBlogPostCommandBus implements CommandBus
{
    /**
     * @param MessageBusInterface $commandBus
     */
    public function __construct(private MessageBusInterface $commandBus)
    {
    }

    /**
     * @param Command $command
     *
     * @return void
     */
    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
