<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity\ValueObject;

/**
 * Interface Uuid.
 */
interface Uuid
{
    /**
     * @return string
     */
    public static function generate(): string;
}
