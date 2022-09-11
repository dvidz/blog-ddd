<?php

declare(strict_types=1);

namespace App\Blog\Application\FindBlogPost;

use App\Blog\Application\CreateBlogPost\BlogPostCommand;
use App\Blog\Domain\Entity\BlogPost;
use App\Shared\Domain\Response\Response;

/**
 * Class FindBlogPostResponse.
 */
class FindBlogPostResponse implements Response
{
    /**
     * @param BlogPost[] $blogPosts
     */
    public function __construct(protected array $blogPosts)
    {

    }

    /**
     * @return array
     */
    public function respond(): array
    {
        $data = [];

        foreach ($this->blogPosts as $blogPost) {
            $item = [
                'uuid' => $blogPost->uuid(),
                'title' => $blogPost->title(),
            ];

            $data[] = $item;
        }

        return $data;
    }
}
