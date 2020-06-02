<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\CustomerPhone;

/**
 * Class CustomerContactDataRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class CustomerPhoneRepositoryEloquent extends BaseRepository implements CustomerPhoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerPhone::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}