<?php

declare(strict_types=1);

namespace App\Shared\Application;

use App\Shared\Domain\Response\Response as DomainResponse;

/**
 * Interface Presenter.
 */
interface Presenter
{
    /**
     * @param DomainResponse $response
     *
     * @return void
     */
    public function present(DomainResponse $response): void;

    /**
     * @return ViewModel
     */
    public function viewModel(): ViewModel;
}
