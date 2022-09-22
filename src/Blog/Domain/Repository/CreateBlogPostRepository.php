<?php

declare(strict_types=1);

namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Entity\BlogPost;

/**
 * Interface CreateBlogPostRepository.
 */
interface CreateBlogPostRepository
{
    public function save(BlogPost $blogPost): bool;
}
