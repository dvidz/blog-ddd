<?php

declare(strict_types=1);

namespace App\Blog\Application\CreateBlogPost;

use App\Shared\Domain\Command\CommandHandler;

/**
 * Class BlogPostCommandHandler.
 */
class BlogPostCommandHandler implements CommandHandler
{
    /**
     * @param BlogPostCreator $blogPostCreator
     */
    public function __construct(protected BlogPostCreator $blogPostCreator)
    {

    }

    /**
     * @param BlogPostCommand $blogPostCommand
     *
     * @return void
     */
    public function __invoke(BlogPostCommand $blogPostCommand): void
    {
        $this->blogPostCreator->blogPost($blogPostCommand);
    }
}
