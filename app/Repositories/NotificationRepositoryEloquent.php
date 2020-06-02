<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\NotificationRepository;
use Nexo\Entities\Notification;

/**
 * Class NotificationRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class NotificationRepositoryEloquent extends BaseRepository implements NotificationRepository
{

    protected $fieldSearchable = array(
        'readed' => '='
    );
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Notification::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}