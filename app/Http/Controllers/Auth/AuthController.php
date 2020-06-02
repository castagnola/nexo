<?php

namespace Nexo\Http\Controllers\Auth;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Nexo\Entities\Team;
use Nexo\Entities\User;
use Validator, Sentinel;
use Nexo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public $redirectPath = '/';
    public $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout','getActivate','getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return $this->showLoginForm();
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $view = property_exists($this, 'loginView')
            ? $this->loginView : 'auth.authenticate';


        if (view()->exists($view)) {
            return view($view);
        }

        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        $user = Sentinel::findByCredentials($credentials);


        if (\Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {

            if($user->inRole('despachador')){
                $team = $user->teams->first();
                $redirect = '/'.$team->slug;

                if ($throttles) {
                    $this->clearLoginAttempts($request);
                }
                
                return redirect($redirect);
            }

            if($user->inRole('customer')){
                $customer = $user->customers()->first();
                $team  = $customer->team;
                //$redirect = '/'.$team->slug;
                $redirect = '/customer';

                if ($throttles) {
                    $this->clearLoginAttempts($request);
                }
                
                return redirect($redirect);
            }

            return $this->handleUserWasAuthenticated($request, $throttles);
        }


        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {

        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        $errors = $this->getFailedLoginMessage();

        $user = Sentinel::findByCredentials($credentials);

        if (!empty($user)) {

            if ($user->inRole('admin') || $user->inRole('nexo-user')) {
                if (!empty(\Activation::completed($user))) {


                    if (Sentinel::authenticateAndRemember($credentials)) {

                        \JWTAuth::fromUser($user);

                        return redirect('/');
                    }
                }

                $errors = trans('auth.inactive');
            }
        }


        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $errors,
            ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {

        \Sentinel::logout(null, true);

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

     /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::guard($this->getGuard())->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDelegation(Request $request)
    {
        $token = \JWTAuth::parseToken()->refresh();

        return response()->json(compact('token'));
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * @param $activationCode
     */
    public function getActivate(Team $team,$userId, $activationCode)
    {

        try {
            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        if (\Activation::completed($user)) {
            return view('team.auth.already-activated', compact('team', 'user'));
        }

        if(!\Activation::exists($user, $activationCode)){
            $activationCode = \Activation::create($user)->getCode();
        }

        $url = url("auth/activate/{$userId}/{$activationCode}");

        return view('team.auth.activate', compact('url', 'team', 'user'));
    }


    public function postActivate(Request $request, Team $team, $userId, $activationCode)
    {
        $payload = $request->only('password', 'password_confirmation');

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \Sentinel::findById($userId);

        if (\Activation::completed($user)) {
            return view('team.auth.already-activated', compact('team', 'user'));
        }

        \Sentinel::update($user, $payload);
        \Activation::complete($user, $activationCode);

        return view('team.auth.thanks', compact('team', 'user'));
    }

}
