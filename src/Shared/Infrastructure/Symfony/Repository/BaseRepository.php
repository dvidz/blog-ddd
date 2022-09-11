<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Abstract class BaseRepository.
 */
abstract class BaseRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->className());
    }

    /**
     * @return string
     */
    protected function className() : string
    {
        return '';
    }
}
