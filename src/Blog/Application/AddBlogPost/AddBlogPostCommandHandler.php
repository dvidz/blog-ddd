<?php

declare(strict_types=1);

namespace App\Blog\Application\AddBlogPost;

use App\Shared\Domain\Command\CommandHandler;

/**
 * Class BlogPostCommandHandler.
 */
class AddBlogPostCommandHandler implements CommandHandler
{
    /**
     * @param BlogPostCreator $blogPostCreator
     */
    public function __construct(protected BlogPostCreator $blogPostCreator)
    {

    }

    /**
     * @param AddBlogPostCommand $blogPostCommand
     *
     * @return void
     */
    public function __invoke(AddBlogPostCommand $blogPostCommand): void
    {
        $this->blogPostCreator->blogPost($blogPostCommand);
    }
}
