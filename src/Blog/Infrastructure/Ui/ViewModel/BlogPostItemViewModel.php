<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Ui\ViewModel;

use App\Shared\Application\ViewModel;

/**
 * Class BlogPostItemViewModel.
 */
class BlogPostItemViewModel implements ViewModel
{
    public string $uuid;
    public string $title;
}
