<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\BlogPost;
use \App\Blog\Domain\Repository\CreateBlogPostRepository as DomainCreateBlogPostRepository;
use App\Shared\Infrastructure\Symfony\Repository\BaseRepository;

/**
 * Class CreateBlogPostRepository.
 */
class CreateBlogPostRepository extends BaseRepository implements DomainCreateBlogPostRepository
{
    /**
     * @param BlogPost $blogPost
     *
     * @return bool
     */
    public function save(BlogPost $blogPost): bool
    {
        try {
            $em = $this->getEntityManager();
            $em->persist($blogPost);
            $em->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    protected function className(): string
    {
        return BlogPost::class;
    }
}
