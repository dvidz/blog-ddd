<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\BlogPost;
use \App\Blog\Domain\Repository\FindBlogPostRepository as DomainFindBlogRepository;
use App\Shared\Infrastructure\Symfony\Repository\BaseRepository;

/**
 * Class FindBlogPostRepository.
 */
class FindBlogPostRepository extends BaseRepository implements DomainFindBlogRepository
{

    /**
     * @param int $limit
     *
     * @return BlogPost[]
     */
    public function findBlogPost(int $limit): array
    {
        return $this->findAll();
    }

    /**
     * @return string
     */
    protected function className(): string
    {
        return BlogPost::class;
    }
}
