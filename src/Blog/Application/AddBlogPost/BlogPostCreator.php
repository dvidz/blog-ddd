<?php

declare(strict_types=1);

namespace App\Blog\Application\AddBlogPost;

use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Domain\Repository\CreateBlogPostRepository as DomainCreateBlogPostRepository;
use App\Shared\Domain\Entity\ValueObject\Uuid;
use Exception;

/**
 * Class BlogPostCreator.
 */
class BlogPostCreator
{
    /**
     * @var DomainCreateBlogPostRepository
     */
    private DomainCreateBlogPostRepository $createBlogPostRepository;

    /**
     * @var Uuid
     */
    private Uuid $uuid;

    /**
     * @param DomainCreateBlogPostRepository $blogPostRepository
     * @param Uuid                           $uuid
     */
    public function __construct(DomainCreateBlogPostRepository $blogPostRepository, Uuid $uuid)
    {
        $this->createBlogPostRepository = $blogPostRepository;
        $this->uuid = $uuid;
    }

    /**
     * @param AddBlogPostCommand $blogPostCommand
     *
     * @return bool
     */
    public function blogPost(AddBlogPostCommand $blogPostCommand): bool
    {
        try {
            $blogPost = BlogPost::blogPost($this->uuid, $blogPostCommand->title);

            return $this->createBlogPostRepository->save($blogPost);
        } catch (Exception) {
            return false;
        }
    }
}
