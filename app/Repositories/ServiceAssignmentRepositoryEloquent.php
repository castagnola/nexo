<?php

namespace Nexo\Repositories;

use Nexo\Entities\Criteria\ServiceAssignment\StatusCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\ServiceAssignment;

/**
 * Class ServiceAssignmentRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceAssignmentRepositoryEloquent extends BaseRepository implements ServiceAssignmentRepository
{

    protected $fieldSearchable = [
        'accepted',
        'declined'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceAssignment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(StatusCriteria::class));
    }
}