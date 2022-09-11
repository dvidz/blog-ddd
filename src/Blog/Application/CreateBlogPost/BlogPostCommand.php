<?php

declare(strict_types=1);

namespace App\Blog\Application\CreateBlogPost;

use App\Shared\Domain\Command\Command;

/**
 * Class BlogPostCommand.
 */
class BlogPostCommand implements Command
{
    public ?string $uuid;
    public string $title;
}
