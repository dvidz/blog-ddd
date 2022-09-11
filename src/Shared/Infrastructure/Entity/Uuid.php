<?php

namespace App\Shared\Infrastructure\Entity;

use \App\Shared\Domain\Entity\ValueObject\Uuid as DomainUuid;
use Ramsey\Uuid\Uuid as RamseyUuid;

/**
 * Class Uuid.
 */
class Uuid implements DomainUuid, \Stringable
{
    /**
     * @var string
     */
    protected string $value;

    /**
     * Uuid class constructor.
     */
    public function __construct()
    {
        $this->value = RamseyUuid::uuid4()->toString();
    }

    /**
     * @return $this
     */
    public static function generate(): string
    {
        return new self();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
