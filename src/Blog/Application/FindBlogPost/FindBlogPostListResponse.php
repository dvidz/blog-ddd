<?php

declare(strict_types=1);

namespace App\Blog\Application\FindBlogPost;

use App\Blog\Domain\Entity\BlogPost;
use App\Shared\Application\Response;
use App\Shared\Domain\Response\Response as DomainResponse;

/**
 * Class FindBlogPostResponse.
 */
class FindBlogPostListResponse extends Response implements DomainResponse
{
    /**
     * @param BlogPost[] $blogPosts
     * @param array|null $exceptions
     */
    public function __construct(protected ?array $blogPosts, protected ?array $exceptions = null)
    {
        parent::__construct($this->exceptions);
    }

    /**
     * @return array
     */
    public function respond(): array
    {
        return $this->blogPosts;
    }
}
