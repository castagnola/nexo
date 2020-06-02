<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\LocationStateRepository;
use Nexo\Entities\LocationState;

/**
 * Class LocationStateRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class LocationStateRepositoryEloquent extends BaseRepository implements LocationStateRepository
{

    protected $fieldSearchable = [
        'name' => 'like',
        'code' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LocationState::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}