<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Customer;
use Nexo\Entities\Team;
use Nexo\Entities\UserDevice;
use Nexo\Http\Controllers\Controller;
use Nexo\Transformers\UserTransformer;
use Illuminate\Support\Facades\Password;
use Validator, Sentinel;
use Illuminate\Mail\Message;

/**
 * Class AuthController
 * @package Nexo\Http\Controllers\Api
 */
class AuthController extends Controller
{
    use ApiResponse;

    /**
     * @var UserTransformer
     */
    protected $transformer;

    /**
     * @param UserTransformer $transformer
     */
    public function __construct(UserTransformer $transformer)
    {
        $this->transformer = $transformer;
    }



    /**
     * @param Request $request
     * @return mixed
     */
    public function postLogin(Request $request)
    {


        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Dingo\Api\Exception\ResourceException('El email o la contraseña son incorrectos.', $validator->getMessageBag());
        }


        $user = Sentinel::findByCredentials($credentials);
        $valid = $user !== null ? Sentinel::validateCredentials($user, $credentials) : false;


        if ($valid) {
            $token = \JWTAuth::fromUser($user);

            $team = ($user->teams()->first());

            if(empty($team)){
                throw new \Dingo\Api\Exception\ResourceException('El usuario no tiene asignada una empresa.');
            }

            $teamId = $team->hashId;


            $roles = $user->roles()->lists('slug')->toArray();

            return $this->response->array([
                'token' => $token,
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatarUrl(),
                    'id' => $user->id,
                    'roles' => $roles,
                    'lang' => $user->lang
                ],

                'team' => [
                    'id' => $teamId,
                    'name' => $team->name,
                    'logo' => $team->logoUrl('medium')
                ],
                'is_customer' => in_array('customer', $roles),
                'is_rutero' => in_array('rutero', $roles),
                'api_url' => url("api/users/{$user->id}") . '/'
            ]);
        }

        return $this->response->errorBadRequest('El email o la contraseña son inválidos.');
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function postLogout(Request $request)
    {
        $userId = $request->get('user_id');
        $userDeviceId = $request->get('user_device_id');

        UserDevice::where('id', $userDeviceId)->delete();

        return $this->response->noContent();
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function postRecoveryPassword(Request $request)
    {
        $payload = $request->only('email');

        $validator = Validator::make($payload, [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            throw new \Dingo\Api\Exception\ResourceException('Información incompleta.', $validator->getMessageBag());
        }

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject('Recuperar contraseña en Nexo');
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return $this->response->noContent();

            case Password::INVALID_USER:
                return $this->response->errorBadRequest(trans($response));
        }
    }

}
