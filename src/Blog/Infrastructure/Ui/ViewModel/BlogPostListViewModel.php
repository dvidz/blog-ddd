<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Ui\ViewModel;

use App\Shared\Application\ViewModel;

/**
 * Class BlogPostListViewModel.
 */
class BlogPostListViewModel implements ViewModel
{
    /**
     * @var BlogPostItemViewModel[]
     */
    public array $blogPosts;
}
