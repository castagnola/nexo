<?php namespace Nexo\Entities\Criteria\User;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class OnlySystemCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->whereHas('roles', function($query){
            $query->whereIn('slug', ['admin', 'nexo-user']);
        });
        return $model;
    }
}