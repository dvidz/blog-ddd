<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Ui\View;

use App\Shared\Application\View;
use App\Shared\Application\ViewModel;
use App\Shared\Infrastructure\Ui\ViewModel\ExceptionsViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogPostListJsonView.
 */
class BlogPostListJsonView implements View
{

    /**
     * @param ViewModel $viewModel
     *
     * @return JsonResponse
     */
    public function generateView(ViewModel $viewModel): JsonResponse
    {
        if ($viewModel instanceof(ExceptionsViewModel::class)) {
            return new JsonResponse($viewModel, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse($viewModel, Response::HTTP_OK);
    }
}
