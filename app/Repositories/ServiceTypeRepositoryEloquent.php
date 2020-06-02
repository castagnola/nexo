<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\ServiceType;

/**
 * Class ServiceTypeRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceTypeRepositoryEloquent extends BaseRepository implements ServiceTypeRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceType::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}