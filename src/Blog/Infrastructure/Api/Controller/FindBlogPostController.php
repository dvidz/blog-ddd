<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Api\Controller;

use App\Blog\Application\CreateBlogPost\BlogPostCommand;
use App\Blog\Application\FindBlogPost\FindBlogPostQuery;
use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Infrastructure\Api\Query\FindBlogPostQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class FindBlogPostController.
 */
class FindBlogPostController extends AbstractController
{
    /**
     * @param FindBlogPostQueryBus $queryBus
     */
    public function __construct(private FindBlogPostQueryBus $queryBus, private SerializerInterface $serializer)
    {

    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $blogPosts = $this->queryBus->ask(new FindBlogPostQuery())
            ->respond();

        return new JsonResponse($blogPosts, Response::HTTP_OK);
    }
}
