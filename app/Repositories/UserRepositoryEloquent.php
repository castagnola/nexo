<?php

namespace Nexo\Repositories;

use Carbon\Carbon;
use Nexo\Entities\Criteria\User\RoleCriteria;
use Nexo\Entities\Notification;
use Nexo\Entities\Role;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\UserContactData;
use Nexo\Entities\UserDevice;
use Nexo\Entities\UserGeolocalization;
use Nexo\Entities\UserPush;
use Nexo\Entities\UserTransport;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class TeamRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(RoleCriteria::class));
    }


    /**
     * @return mixed
     */
    public function validator()
    {
        return UserValidator::class;
    }


    /**
     * @param $teamId
     * @param array $columns
     * @return mixed
     */
    public function allByTeamId($teamId, $columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->whereHas('teams', function ($query) use ($teamId) {
            return $query->where('id', $teamId);
        })->get($columns);
        $this->resetModel();
        return $this->parserResult($model);
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            $this->validator->with($attributes)
                ->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        \DB::beginTransaction();
        $this->resetModel();

        $this->processAvatar($attributes);

        $model = \Sentinel::registerAndActivate($attributes);

        $this->processUser($attributes, $model);

        \DB::commit();

        return $this->parserResult($model);
    }


    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        \DB::beginTransaction();

        $attributesToSave = $attributes;

        if (isset($attributesToSave['password'])) {
            unset($attributesToSave['password']);
        }

        if (isset($attributesToSave['confirm_password'])) {
            unset($attributesToSave['confirm_password']);
        }

        if (isset($attributesToSave['roles'])) {
            unset($attributesToSave['roles']);
        }

        if (isset($attributesToSave['contact'])) {
            unset($attributesToSave['contact']);
        }

        if (isset($attributesToSave['services'])) {
            unset($attributesToSave['services']);
        }

        $this->processAvatar($attributesToSave);

        $model = parent::update($attributesToSave, $id);

        // Actualizando los roles
        $this->processUser($attributes, $model);

        // Actualizando contraseña
        if (isset($attributes['password'])) {
            $newPassword = $attributes['password'];

            if (!empty($newPassword)) {
                \Sentinel::update($model, [
                    'password' => $newPassword
                ]);
            }
        }

        \DB::commit();


        return $this->parserResult($model);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        // Borrando datos foráneos



        Notification::where('created_by', $id)->delete();
        Notification::where('user_id', $id)->delete();
        ServiceAssignment::withTrashed()->where('user_id', $id)->forceDelete();
        UserContactData::where('user_id', $id)->delete();
        UserTransport::where('user_id', $id)->delete();
        UserGeolocalization::where('user_id', $id)->delete();
        UserDevice::where('user_id', $id)->delete();
        UserPush::where('user_id', $id)->delete();

        $deleted = parent::delete($id);


        return $deleted;
    }

    /**
     * Cambiar el estado de un usuario
     *
     * @param $model
     * @param $status
     * @return bool
     */
    public function changeStatus($model, $status)
    {
        $change = false;
        switch ($status) {
            case 'active':
                $activation = \Activation::exists($model);
                if (empty($activation)) {
                    $activation = \Activation::create($model);
                }
                $change = \Activation::complete($model, $activation->code);
                break;

            case 'inactive':
                $change = \Activation::remove($model);
                break;
        }

        if ($change) {
            $model->updated_at = Carbon::now()->toDateTimeString();
            $model->save();
        }

        return $change;
    }

    /**
     * @param $attributes
     */
    private function processAvatar(&$attributes)
    {
        $avatar = isset($attributes['avatar']) ? $attributes['avatar'] : false;
        $email = isset($attributes['email']) ? $attributes['email'] : 0;

        if (!empty($avatar)) {
            $fileName = sprintf('avatars/%s/%s.jpg', md5($email), md5($avatar) . str_random(8));

            \Storage::makeDirectory('avatars/' . md5($email));
            $path = storage_path('app/' . $fileName);

            $image = \Image::make($avatar);

            $image->fit(300)->save($path);

            $attributes['avatar'] = $fileName;
        } else {
            unset($attributes['avatar']);
        }
    }

    /**
     * @param $attributes
     * @param $model
     */
    private function processUser($attributes, $model)
    {
        $roles = collect([]);


        if (isset($attributes['team_id'])) {
            $model->teams()->attach($attributes['team_id']);
        }

        // Guardando roles
        if (isset($attributes['role_id'])) {
            $role = Role::find($attributes['role_id']);
            $model->roles()->sync([$role->id]);
            $roles->push($role);
        }



        // Activado?
        if (isset($attributes['active'])) {
            $active = (bool)$attributes['active'];

            if ($active) {
                $activation = \Activation::exists($model);
                if (empty($activation)) {
                    $activation = \Activation::create($model);
                }
                $change = \Activation::complete($model, $activation->code);
            } else {
                $change = \Activation::remove($model);
            }

            if ($change) {
                $model->updated_at = Carbon::now()->toDateTimeString();
                $model->save();
            }
        }


        // Guardando extra data
        if (isset($attributes['contact'])) {
            $contactRepository = app(UserContactDataRepository::class);
            $saved = [];

            foreach ($attributes['contact'] as $contact) {
                if (isset($contact['id'])) {
                    $new = $contactRepository->update($contact, $contact['id']);
                } else {
                    $contact['user_id'] = $model->id;
                    $new = $contactRepository->create($contact);
                }

                $saved[] = $new->id;
            }

            $model->contact()->whereNotIn('id', $saved)->delete();
            unset($saved);
        }

        // Si es rutero y tiene transportes
        if (isset($attributes['transports']) and !$roles->where('slug', 'rutero')->isEmpty()) {


            $transportRepository = app(UserTransportRepository::class);
            $saved = [];

            foreach ($attributes['transports'] as $transport) {
                $transport['user_id'] = $model->id;


                if (isset($transport['id'])) {
                    $new = $transportRepository->update($transport, $transport['id']);
                } else {
                    $new = $transportRepository->create($transport);
                }

                $saved[] = $new->id;
            }

            $model->transports()->whereNotIn('id', $saved)->delete();
            unset($saved);
        }
    }


}