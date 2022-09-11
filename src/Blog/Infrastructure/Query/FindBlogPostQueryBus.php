<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Query;

use App\Shared\Domain\Query\Query;
use App\Shared\Domain\Query\QueryBus;
use App\Shared\Domain\Response\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

/**
 * Class FindBlogPostQueryBus.
 */
class FindBlogPostQueryBus implements QueryBus
{
    public function __construct(protected MessageBusInterface $queryBus)
    {
    }

    /**
     * @param Query $query
     *
     * @return Response|null
     */
    public function ask(Query $query): ?Response
    {
        /** @var HandledStamp $stamp */
        $stamp = $this->queryBus->dispatch($query)->last(HandledStamp::class);

        return $stamp->getResult();
    }
}
