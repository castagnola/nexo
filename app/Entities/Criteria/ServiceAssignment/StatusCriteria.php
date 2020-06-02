<?php namespace Nexo\Entities\Criteria\ServiceAssignment;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class StatusCriteria implements CriteriaInterface
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
        if ($this->request->exists('status')) {
            $status = $this->request->get('status');
            switch ($status) {
                case 'pending':
                    $model = $model->where('accepted', 0)->where('declined', 0);
                    break;
            }
        }

        return $model;
    }
}