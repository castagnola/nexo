<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\UserDevice;

/**
 * Class UserDeviceRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserDeviceRepositoryEloquent extends BaseRepository implements UserDeviceRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid' => '=',
        'token' => '=',
        'platform' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserDevice::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}