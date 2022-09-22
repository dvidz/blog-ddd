<?php

declare(strict_types=1);

namespace App\Blog\Domain\Entity;

use App\Blog\Domain\Entity\ValueObject\Title;
use App\Shared\Domain\Entity\AggregateRoot;
use App\Shared\Domain\Entity\ValueObject\Uuid;

/**
 * Class BlogPost.
 */
class BlogPost extends AggregateRoot
{
    /**
     * @param Uuid  $uuid
     * @param Title $title
     */
    private function __construct(Uuid $uuid, protected Title $title)
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
        return new self($uuid, new Title($title));
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title->value();
    }
}
