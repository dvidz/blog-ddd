<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Domain\Repository\CreateBlogPostRepository as DomainCreateBlogPostRepository;

/**
 * Class InMemoryBlogPostRepository.
 */
class InMemoryBlogPostRepository implements DomainCreateBlogPostRepository
{
    /**
     * @var BlogPost[]
     */
    private array $blogPosts;

    /**
     * @param BlogPost $blogPost
     *
     * @return bool
     */
    public function save(BlogPost $blogPost): bool
    {
        $this->blogPosts[] = $blogPost;

        return true;
    }
}
