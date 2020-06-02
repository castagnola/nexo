<?php namespace Nexo\Entities\Criteria\Service;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class UserCriteria implements CriteriaInterface
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
        if ($this->request->exists('search_user')) {
            $user = $this->request->get('search_user');

            $model = $model->whereHas('users', function($query) use ($user){
                return $query->where('users.id', $user);
            });
        }

        return $model;
    }
}