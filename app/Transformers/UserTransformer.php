<?php

namespace Nexo\Transformers;

use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
use Nexo\Entities\Role;
use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\User;

/**
 * Class UserTransformer
 * @package namespace Nexo\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['geolocalizations','services'];

    protected $availableIncludes = ['geolocalizations', 'assignments', 'services', 'contact', 'phones', 'transports'];

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        $roles = $model->roles;
        $role = $roles->first();
        $roleName = null;
        $roleSlug = null;
        $return = null;

        if (!empty($role)) {
            $roleName = $role->name;
            $roleSlug = $role->slug;
        } else {
            // Verificando si no tiene grupo para añadirlo a rutero
            if (!$model->teams->isEmpty()) {
                $ruteroRole = Role::where('slug', 'rutero')->first();
                $model->roles()->sync([$ruteroRole->id]);
                $roleName = $ruteroRole->name;
            }
        }


        $return = [
            'id' => (int)$model->id,
            'role_id' => !empty($role) ? (int)$role->id : null,
            'code' => $model->getCode(),

            /* place your other model properties here */
            'name' => $model->name,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'avatar' => $model->avatarSizes(),
            'email' => $model->email,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'role' => $roleName,
            'role_slug' => $roleSlug,
            'roles' => $roles->lists('name')->toArray(),
            'can_schedule' => $model->inRole('rutero'),
            'active' => !!\Activation::completed($model),
            'app_status' => $model->app_status
        ];

        if($model->inRole('rutero')){
            //$return['services'] = $model->services;
        }

        if($model->inRole('customer')){
            $return['customer'] = $model->customers()->first();
        }

        return $return;
    }

    /**
     * @param User $model
     * @param ParamBag $params
     * @return \League\Fractal\Resource\Collection
     */
    public function includeGeolocalizations(User $model)
    {
        return $this->collection($model->geolocalizations, new UserGeolocalizationTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAssignments(User $model)
    {
        return $this->collection($model->assignments, new ServiceAssignmentTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeServices(User $model)
    {
        return $this->collection($model->services, new ServiceTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContact(User $model)
    {
        return $this->collection($model->contact, new UserContactDataTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includePhones(User $model)
    {
        return $this->collection($model->phones, new UserContactDataTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTransports(User $model)
    {
        return $this->collection($model->transports, new UserTransportTransformer());
    }

    /**
     * @param User $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCustomer(User $model)
    {
        return $this->collection($model->customers, new CustomerTransformer());
    }
}