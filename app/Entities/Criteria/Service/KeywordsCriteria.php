<?php namespace Nexo\Entities\Criteria\Service;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class KeywordsCriteria implements CriteriaInterface
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
        if ($this->request->exists('keywords')) {
            $keywords = $this->request->get('keywords');

            $model = $model->where('code', 'like', "%{$keywords}%");
        }

        return $model;
    }
}