<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Api\Controller;

use App\Blog\Application\FindBlogPost\FindBlogPostQuery;
use App\Blog\Infrastructure\Query\FindBlogPostQueryBus;
use App\Blog\Infrastructure\Ui\Presenter\BlogPostListJsonPresenter;
use App\Blog\Infrastructure\Ui\View\BlogPostListJsonView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FindBlogPostController.
 */
class FindBlogPostController extends AbstractController
{
    /**
     * @param FindBlogPostQueryBus      $queryBus
     * @param BlogPostListJsonView      $view
     * @param BlogPostListJsonPresenter $presenter
     */
    public function __construct(
        private FindBlogPostQueryBus $queryBus,
        private BlogPostListJsonView $view,
        private BlogPostListJsonPresenter $presenter
    ) {

    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $this->presenter->present(
            $this->queryBus->ask(new FindBlogPostQuery())
        );

        return $this->view->generateView($this->presenter->viewModel());
    }
}
