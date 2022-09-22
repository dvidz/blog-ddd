<?php

declare(strict_types=1);

namespace App\Shared\Application;

/**
 * Interface View.
 */
interface View
{
    public function generateView(ViewModel $viewModel): mixed;
}
