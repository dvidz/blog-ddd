<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Api\Controller;

use App\Blog\Application\AddBlogPost\AddBlogPostCommand;
use App\Shared\Domain\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CreateBlogPostController.
 */
class CreateBlogPostController extends AbstractController
{
    /**
     * @param SerializerInterface    $serializer
     * @param CommandBus|null        $commandBus
     */
    public function __construct(
        private SerializerInterface $serializer,
        private ?CommandBus $commandBus
    ) {
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $data = [
            'title' => 'Titre de ouf',
        ];

        $blogPostCommand = $this->serializer->denormalize($data, AddBlogPostCommand::class);

        try {
            $this->commandBus->dispatch($blogPostCommand);
        } catch (\Exception) {
            return new JsonResponse('KO', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse([], Response::HTTP_CREATED);
    }
}
