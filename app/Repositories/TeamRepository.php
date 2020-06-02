<?php

namespace Nexo\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TeamRepository
 * @package namespace Nexo\Repositories;
 */
interface TeamRepository extends RepositoryInterface
{
    public function findBySlug($slug);
}
