<?php

namespace Nexo\Http\Controllers\Auth;

use Nexo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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

    public $redirectPath = '/password/reset-success';
    public $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('sentinel.guest');
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
    public function postEmail(Request $request){
        //$this->validate($request, ['email' => 'required']);
        $post = Request::all();
        unset($post['_token']);
        $email = $post['email'];

        $item = $this->model->where('activo', '=', 1)
                                    ->where('email', '=', $email)
                                    ->first();



        if(empty($item)){
            Alert::add('error', 'El correo '.$email.' no existe')->flash();
            return redirect('/');
        }



        $response = $this->passwords->sendResetLink($post, function($message){
            $message->subject('Olvidaste tu contraseña ?');
        });


        switch ($response)
        {
            case PasswordBroker::RESET_LINK_SENT:
                Alert::add('success', 'Revisa tu correo electronico, enviamos las intrucciones para reestablecer tu contraseña.')->flash(); 
                return redirect()->back();

            case PasswordBroker::INVALID_USER:
                Alert::add('error', 'El correo '.$email.' no existe.')->flash();
                return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postReset(Request $request){
        $post = Request::all();

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
            $user->password = Hash::make($password);
            $user->save();
            //Alert::add('success', 'Bienvenido '.$user->nombre_usuario)->flash();
            $this->auth->login($user);
        });


        switch ($response)
        {
            case PasswordBroker::PASSWORD_RESET:
                return redirect($this->redirectPath());

            case PasswordBroker::INVALID_PASSWORD:
                Alert::add('error', 'Contraseña no valida, recuerde debe tener minino 8 caracteres.')->flash();
                return redirect()->back()
                            ->withInput($post);

            case PasswordBroker::INVALID_TOKEN:
                Alert::add('error', 'Solicitar de nuevo tu contraseña.')->flash();
                return redirect()->back()
                            ->withInput($post);

            case PasswordBroker::INVALID_USER:
                Alert::add('error', 'Usuario no valido.')->flash();
                return redirect()->back()
                            ->withInput($post);

            default:
                Alert::add('error', 'Token no valido, vuelva a solicitar tu contraseña.')->flash();
                return redirect()->back()
                            ->withInput($post);
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
