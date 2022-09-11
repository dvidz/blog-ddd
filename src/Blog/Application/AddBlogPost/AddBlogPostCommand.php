<?php

declare(strict_types=1);

namespace App\Blog\Application\AddBlogPost;

use App\Shared\Domain\Command\Command;

/**
 * Class BlogPostCommand.
 */
class AddBlogPostCommand implements Command
{
    public ?string $uuid;
    public string $title;
}
