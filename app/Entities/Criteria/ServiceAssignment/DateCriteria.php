<?php namespace Nexo\Entities\Criteria\ServiceAssignment;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class DateCriteria implements CriteriaInterface
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
        if ($this->request->exists('start_at')) {
            $start = $this->request->get('start_at');

            $model = $model->whereHas('service', function($query) use ($start){
                return $query->where('start_at', '>=', $start);
            });
        }

        if ($this->request->exists('end_at')) {
            $end = $this->request->get('end_at');

            $model = $model->whereHas('service', function($query) use ($end){
                return $query->where('end_at', '<=', $end);
            });
        }

        return $model;
    }
}