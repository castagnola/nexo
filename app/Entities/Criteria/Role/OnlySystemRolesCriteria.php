<?php namespace Nexo\Entities\Criteria\Role;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class OnlySystemRolesCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereIn('slug',['admin', 'nexo-user']);
        return $model;
    }
}