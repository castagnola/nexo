<?php

namespace Nexo\Http\Controllers;

use Nexo\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Nexo\Entities\User;
use Nexo\Http\Controllers\Api\ApiResponse;
//use Request;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    use ApiResponse;

    public $redirectPath = '/password/reset-success';
    public $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
     * @return void
     */
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;

        $this->middleware('sentinel.guest');
        $this->model = new User();
    }


    /**
     * Show the application reset email form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail(){
        return view('auth.passwords.email');
    }

    /**
     * Show the application reset form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null,$email = ''){
        if (is_null($token))
        {
            throw new NotFoundHttpException;
        }

        return view('auth.passwords.reset')->with('token', $token)
                                 ->with('email', $email);
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postResetlink(Request $request){
        $post = $request->all();
        $error = array();
        $errors = collect();


        unset($post['_token']);
        $email = $post['email'];
    

        if(empty($email)){
            $error[] = 'Por favor ingresa un correo';
            $errors->put('errors',$error);
            return redirect()->back()->with('errors',$errors);
        }

        $item = $this->model->where('email', '=', $email)->first();


        if(empty($item)){
            $error[] = 'El correo '.$email.' no existe.';
            $errors->put('errors',$error);
            return redirect()->back()->with('errors',$errors);
        }


        $response = $this->passwords->sendResetLink($post, function($message){
            $message->subject('Olvidaste tu contraseña ?');
        });


        switch ($response)
        {
            case PasswordBroker::RESET_LINK_SENT:
                $error[] = 'Hemos enviado un mensaje a tu correo para que reestablescas la contraseña';
                $errors->put('success',$error);
                return redirect()->back()->with('errors',$errors);

            case PasswordBroker::INVALID_USER:
                $error[] = 'El correo '.$email.' no existe.';
                $errors->put('errors',$error);
                return redirect()->back()->with('errors',$errors);
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postResets(Request $request){
        $post = $request->all();
        $error = array();
        $errors = collect();        

        /*$this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);*/

        unset($post['_token']);
        $email = $post['email'];

        $credentials = $post;

        $response = $this->passwords->reset($credentials, function($user, $password)
        {
            $user->password = \Hash::make($password);
            $user->save();
            //Alert::add('success', 'Bienvenido '.$user->nombre_usuario)->flash();
            $this->auth->login($user);
        });


        switch ($response)
        {
            case PasswordBroker::PASSWORD_RESET:
                return redirect($this->redirectPath());

            case PasswordBroker::INVALID_PASSWORD:
                $error[] = 'Contraseña no valida, recuerde debe tener minino 8 caracteres.';
                $errors->put('errors',$error);
                return redirect()->back()->with('errors',$errors);
                

            case PasswordBroker::INVALID_TOKEN:
                $error[] = 'Solicita de nuevo tu contraseña.';
                $errors->put('errors',$error);
                return redirect()->back()->with('errors',$errors);

            case PasswordBroker::INVALID_USER:
                $error[] = 'Usuario no valido.';
                $errors->put('errors',$error);
                return redirect()->back()->with('errors',$errors);

            default:
                $error[] = 'Token no valido, solicita de nuevo tu contraseña.';
                $errors->put('errors',$error);
                return redirect()->back()->with('errors',$errors);
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getResetSuccess()
    {
        return view('auth.password-reset-success');
    }
}
