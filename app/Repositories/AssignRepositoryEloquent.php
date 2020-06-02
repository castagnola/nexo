<?php

namespace Nexo\Repositories;

use Nexo\Repositories\Base\NexoRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\AssignRepository;
use Nexo\Entities\Assign;
use Nexo\Validators\AssignValidator;

/**
 * Class AssignRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class AssignRepositoryEloquent extends BaseRepository implements AssignRepository
{
    use NexoRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Assign::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AssignValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        \DB::beginTransaction();

        $serviceStatusSlug = 'por-asignar';
        $assignments = isset($attributes['assignments']) ? $attributes['assignments'] : false;
        $users = isset($attributes['users']) ? $attributes['users'] : false;


        if (!empty($assignments) and $attributes['assignment_type'] == 'demand') {
            $serviceStatusSlug = 'en-espera';
        }

        if (!empty($users) and $attributes['assignment_type'] == 'mandatory') {
            $serviceStatusSlug = 'por-ejecutar';
        }


        // Generando el código
        $servicesByTeamCounter = $this->model->where('team_id', $attributes['team_id'])->count();
        do {
            $servicesByTeamCounter++;
            $attributes['code'] = sprintf("%'13d", $attributes['team_id']) . sprintf("%03d", $servicesByTeamCounter);
        } while (!parent::findByField('code', $attributes['code'])->isEmpty());


        // Generando el código
        $attributes['verification_code'] = mt_rand(1000, 999999);


        $serviceStatus = ServiceStatus::where('slug', $serviceStatusSlug)->first();
        $attributes['service_status_id'] = $serviceStatus->id;

        // Guardando el mapa
        $this->processMap($attributes);

        // Creando el servicio
        $service = parent::create($attributes);

        $this->processAttributes($service, $attributes);

        \DB::commit();


        foreach ($service->users as $user) {
            event(new UserWasUpdateItinerary($user));
        }

        return $service;
    }

    public function update(array $attributes, $id){
        \DB::beginTransaction();

        $model = parent::update($attributes, $id);
        
        \DB::commit();

        return $model;
    }
}
