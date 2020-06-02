<?php

namespace Nexo\Http\Controllers\Auth;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nexo\Entities\Team;
use Nexo\Entities\User;
use Validator, Sentinel;
use Nexo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class TeamController extends Controller
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

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin(Team $team)
    {
        return view('team.auth.login', compact('team'));
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


    public function postLogin(Request $request, Team $team)
    {

        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);
        $user = Sentinel::findByCredentials($credentials);
        $valid = $user !== null ? Sentinel::validateCredentials($user, $credentials) : false;

        if ($valid) {
            $isAdmin = !$user->getRoles()->where('slug', 'admin')->isEmpty();
            // El usuario pertenece a la empresa?
            if ($team->haveUser($user) || $isAdmin) {
                Sentinel::loginAndRemember($user);
                return redirect()->intended($this->redirectPath());
            }
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    public function getLogout()
    {

        \Sentinel::logout(null, true);
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * @param $activationCode
     */
    public function getActivate(Team $team, $userId, $activationCode)
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