<?php

declare(strict_types=1);

namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Entity\BlogPost;

/**
 * Interface FindBlogPostRepository.
 */
interface FindBlogPostRepository
{
    /**
     * @param int $limit
     *
     * @return BlogPost[]
     */
    public function findBlogPost(int $limit): array;
}
