<?php

namespace Nexo\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Nexo\Entities\Team;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Hashids;
use Auth;

/**
 * Class Controller
 * @package Nexo\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;

    /**
     * @return \Cartalyst\Sentinel\Users\UserInterface
     */
    protected function user()
    {
        return Auth::user();
    }

    /**
     * @return \Illuminate\Auth\GenericUser|\Illuminate\Database\Eloquent\Model
     */
    protected function userApi()
    {
        return app('Dingo\Api\Auth\Auth')->user();
    }

    /**
     * @param $ability
     * @param array $arguments
     * @return \Illuminate\Auth\Access\Response
     */
    public function authorize($ability, $arguments = [])
    {
        return $this->authorizeForUser($this->user(), $ability, $arguments);
        \Gate::authorize();
    }

    /**
     * @param $permissions
     * @return bool
     */
    protected function hasAccess($permissions)
    {
        if ($this->user()->inRole('admin')) {
            return true;
        }
        return $this->user()->hasAccess($permissions);
    }

    /**
     * @return array
     */
    protected function getRights()
    {
        $permissions = config('nexo-permissions');
        $rights = [];

        foreach ($permissions['all'] as $permission) {
            $rights[$permission] = $this->hasAccess($permission);
        }

        return $rights;
    }

    /**
     * @param $request
     * @param null $action
     * @param null $id
     * @return \Illuminate\Validation\Validator
     */
    protected function prepareValidator($request, $action = null, $id = null)
    {
        switch ($action) {
            case 'create':
            case 'new':
                $action = ValidatorInterface::RULE_CREATE;
                break;
            case 'update':
            case 'edit':
                $action = ValidatorInterface::RULE_UPDATE;
                break;
        }

        if (!empty($id)) {
            $this->validator->setId($id);
        }

        return $validator = Validator::make($request->all(), $this->validator->getRules($action));
    }

    /**
     * @param $request
     * @param null $action
     * @param null $id
     */
    protected function makeValidator($request, $action = null, $id = null)
    {
        $validator = $this->prepareValidator($request, $action, $id);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
    }

    /**
     * @param $input
     * @param null $action
     * @param null $id
     */
    protected function makeApiValidator($input, $action = null, $id = null)
    {
        switch ($action) {
            default:
                $createMode = true;
                $action = ValidatorInterface::RULE_CREATE;
                break;
            case 'update':
            case 'edit':
                $createMode = false;
                $this->validator->setId($id);
                $action = ValidatorInterface::RULE_UPDATE;
                break;
        }

        $validator = Validator::make($input, $this->validator->getRules($action));

        if ($validator->fails()) {
            if ($createMode) {
                throw new \Dingo\Api\Exception\StoreResourceFailedException('Error creando el recurso.', $this->formatValidationErrors($validator));
            }

            throw new \Dingo\Api\Exception\UpdateResourceFailedException('Error editando el recurso.', $this->formatValidationErrors($validator));
        }
    }

    /**
     * @param $hashed
     * @return mixed
     */
    protected function decodeHashid($hashed)
    {
        $decoded = Hashids::decode($hashed);

        if (is_array($decoded)) {
            if(array_key_exists(0, $decoded)){
                return $decoded[0];    
            }else{
                return $decoded;
            }
        }

        return $decoded;
    }


    /**
     * @param Request $request
     * @return array|bool|mixed|string
     */
    protected function getTeamId(Request $request)
    {
        if ($request->has('team_id')) {
            $teamId = $request->get('team_id');
        } else {
            $teamId = $request->header('Team-Account-ID');
        }


        if (!empty($teamId)) {
            $teamId = $this->decodeHashid($teamId);


            return $teamId;
        }

        return false;


    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getTeam(Request $request)
    {
        $teamId = $this->getTeamId($request);

        return Team::findOrFail($teamId);
    }
}
