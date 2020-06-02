<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\UserGeolocalizationRepository;
use Nexo\Entities\UserGeolocalization;

/**
 * Class UserGeolocalizationRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserGeolocalizationRepositoryEloquent extends BaseRepository implements UserGeolocalizationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserGeolocalization::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}