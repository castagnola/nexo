<?php namespace Nexo\Entities\Criteria\Role;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class OnlyTeamRolesCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereIn('slug', ['team-admin', 'despachador', 'rutero']);
        return $model;
    }
}