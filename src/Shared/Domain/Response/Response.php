<?php

declare(strict_types=1);

namespace App\Shared\Domain\Response;

/**
 * Interface Response.
 */
interface Response
{
    /**
     * @return array
     */
    public function respond(): array;
}
