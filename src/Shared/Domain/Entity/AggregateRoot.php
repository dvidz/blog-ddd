<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use App\Shared\Domain\Entity\ValueObject\Uuid;

/**
 * Abstract class AggregateRoot.
 */
abstract class AggregateRoot
{
    /**
     * @var string
     */
    protected string $uuid;

    /**
     * @param Uuid $uuid
     */
    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid::generate();
    }

    /**
     * @return string
     */
    public function uuid(): string
    {
        return $this->uuid;
    }
}
