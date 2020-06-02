<?php namespace Nexo\Entities\Criteria\User;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class RoleCriteria implements CriteriaInterface
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if ($this->request->exists('role')) {
            $role = $this->request->get('role');

            $model = $model->whereHas('roles', function ($query) use ($role) {
                return $query->where('slug', $role);
            });
        }

        return $model;
    }
}