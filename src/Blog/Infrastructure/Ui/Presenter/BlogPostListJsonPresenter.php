<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Ui\Presenter;

use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Infrastructure\Ui\ViewModel\BlogPostItemViewModel;
use App\Blog\Infrastructure\Ui\ViewModel\BlogPostListViewModel;
use App\Shared\Application\Presenter;
use App\Shared\Application\ViewModel;
use App\Shared\Domain\Response\Response as DomainResponse;
use App\Shared\Infrastructure\Ui\ViewModel\ExceptionsViewModel;

/**
 * Class BlogPostListJsonPresenter.
 */
class BlogPostListJsonPresenter implements Presenter
{
    /**
     * @var ViewModel
     */
    protected ViewModel $viewModel;

    public function __construct()
    {
        $this->viewModel = new BlogPostListViewModel();
    }

    /**
     * @param DomainResponse $response
     *
     * @return void
     */
    public function present(DomainResponse $response): void
    {
        if (null === $exceptions = $response->exceptions()) {
            $blogPostList = $response->respond();

            $viewItemModels = [];

            /** @var BlogPost $blogPost */
            foreach ($blogPostList as $blogPost) {
                $blogPostItemViewModel = new BlogPostItemViewModel();
                $blogPostItemViewModel->uuid = $blogPost->uuid();
                $blogPostItemViewModel->title = $blogPost->title();

                $viewItemModels[] = $blogPostItemViewModel;
            }

            $this->viewModel->blogPosts = $viewItemModels;
        } else {
            $this->viewModel = new ExceptionsViewModel();

            foreach ($exceptions as $exception) {
                $this->viewModel->errors[] = $exception;
            }
        }
    }

    /**
     * @return ViewModel
     */
    public function viewModel(): ViewModel
    {
        return $this->viewModel;
    }
}
