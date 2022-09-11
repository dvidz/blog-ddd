<?php

declare(strict_types=1);

namespace App\Blog\Application\FindBlogPost;

use App\Blog\Domain\Repository\FindBlogPostRepository;
use App\Shared\Domain\Query\QueryHandler;
use App\Shared\Domain\Response\Response;

/**
 * Class FindBlogPostQueryHandler.
 */
class FindBlogPostQueryHandler implements QueryHandler
{
    /**
     * @param FindBlogPostRepository $findBlogPostRepository
     */
    public function __construct(private FindBlogPostRepository $findBlogPostRepository)
    {

    }

    /**
     * @param FindBlogPostQuery $blogPostQuery
     *
     * @return Response
     */
    public function __invoke(FindBlogPostQuery $blogPostQuery): Response
    {
        try {
            $blogPosts = $this->findBlogPostRepository->findBlogPost();
        } catch (\Exception $e) {
            return new FindBlogPostListResponse(null, [$e]);
        }

        return new FindBlogPostListResponse($blogPosts);
    }
}
