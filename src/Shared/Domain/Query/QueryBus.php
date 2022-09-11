<?php

declare(strict_types=1);

namespace App\Shared\Domain\Query;

use App\Shared\Domain\Response\Response;

/**
 * Interface QueryBus.
 */
interface QueryBus
{
    /**
     * @param Query $query
     *
     * @return Response|null
     */
    public function ask(Query $query): ?Response;
}
