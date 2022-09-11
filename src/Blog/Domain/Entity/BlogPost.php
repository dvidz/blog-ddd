<?php

declare(strict_types=1);

namespace App\Blog\Domain\Entity;

use App\Shared\Domain\Entity\AggregateRoot;
use App\Shared\Domain\Entity\ValueObject\Uuid;

/**
 * Class BlogPost.
 */
class BlogPost extends AggregateRoot
{
    /**
     * @param Uuid   $uuid
     * @param string $title
     */
    private function __construct(Uuid $uuid, protected string $title)
    {
        parent::__construct($uuid);
    }

    /**
     * @param Uuid   $uuid
     * @param string $title
     *
     * @return BlogPost
     */
    public static function blogPost(Uuid $uuid, string $title): self
    {
        return new self($uuid, $title);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}
