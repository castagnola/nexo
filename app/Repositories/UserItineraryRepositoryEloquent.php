<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\UserItineraryRepository;
use Nexo\Entities\UserItinerary;

/**
 * Class UserItineraryRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserItineraryRepositoryEloquent extends BaseRepository implements UserItineraryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserItinerary::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
