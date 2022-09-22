<?php

declare(strict_types=1);

namespace App\Shared\Application;

use Exception;

/**
 * Abstract class Response.
 */
abstract class Response
{
    /**
     * @param array|null $exceptions
     */
    public function __construct(protected ?array $exceptions = null)
    {

    }

    /**
     * @return Exception[]|null
     */
    public function exceptions(): ?array
    {
        if (null === $this->exceptions) {
            return null;
        }

        $exceptions = [];

        foreach ($this->exceptions as $exception) {
            $exceptions[] = [
                'message' => $exception->getMessage(),
            ];
        }

        return $exceptions;
    }
}
