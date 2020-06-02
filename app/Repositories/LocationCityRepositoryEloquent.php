<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\LocationCityRepository;
use Nexo\Entities\LocationCity;

/**
 * Class LocationCityRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class LocationCityRepositoryEloquent extends BaseRepository implements LocationCityRepository
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
        return LocationCity::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}