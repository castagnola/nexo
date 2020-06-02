<?php

namespace Nexo\Http\Controllers;

use Nexo\Entities\Team;
use Nexo\Events\TeamServicesWasUpdated;
use Nexo\Http\Requests;
use Illuminate\Http\Request;
use Hashids;
use Firebase\JWT\JWT;
use Nexo\Repositories\LangRepository;
use Nexo\Repositories\ModuleRepository;
use Nexo\Entities\User;


/**
 * Class CustomerController
 * @package Nexo\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @var
     */
    /**
     * @var LangRepository
     */
    /**
     * @var LangRepository|ModuleRepository
     */
    protected $title, $langRepository, $moduleRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LangRepository $langRepository, ModuleRepository $moduleRepository)
    {
        $this->middleware('auth');
        $this->langRepository = $langRepository;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // Languages
        $lang = [];
        $langs = $this->langRepository->all();

        $langs->each(function ($item) use (&$lang) {
            $lang[$item->code] = $item->content;
        });

        $user = $this->user();  

        if(!$user->inRole('customer')){
            return redirect('/');
        }

        $customer = $user->customers()->first();


        /*if(empty($customer)){
            return Redirect('/');
        }*/

        $user = User::find($user->id);

        $team  = $user->teams()->first();
        $teamId = $team->hashId;

        \App::setLocale($user->lang);



        //Get poll team
        $poll = $team->polls()->where('is_active','=',1)->first();


        \JavaScript::put([
            'documentTypes' => config('nexo.documentTypes'),
            'phonesTypes' => config('nexo.phonesTypes'),
            'token' => \JWTAuth::fromUser($user),
            'firebaseToken' => $this->getFirebaseToken(),
            'rights' => $this->getRights(),
            'roles' => $user->roles->lists('slug')->toArray(),
            'lang' => $user->lang,
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->first_name.' '.$customer->last_name
            ],
            'user' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'name' => $user->first_name.' '.$user->last_name,
                'avatar' => $user->avatarUrl()
            ],
            'team' => [
                'id' => $teamId,
                'name' => $team->name,
                'logo' => $team->logoUrl('medium'),
                'poll' => @$poll->id?:''
            ],
        ]);

        if (empty($this->title)) {
            $this->title = 'Nexo logística';
        }

        $title = $this->title;
        $menu = app('stdClass');

        return view('customer', compact('user', 'title','menu'));
    }


    public function getTemplate(Request $request)
    {
        // Languages
        $name = $request->get('name');
        return view("templates/customer/" . $name);
    }




    /**
     * @param $teamSlug
     * @return \Illuminate\Http\Response
     */
    public function team($teamSlug)
    {
        $team = Team::where('slug', $teamSlug)->firstOrFail();
        $teamId = $team->hashId;
        $teamModulesIds = $team->modules->lists('id')->toArray();

        // Modules actived
        $modules = $this->moduleRepository->all(['id', 'name'])->map(function ($module) use ($teamModulesIds) {
            $module->active = in_array($module->id, $teamModulesIds);
            return $module;
        });

        \JavaScript::put([
            'team' => [
                'id' => $teamId,
                'name' => $team->name,
                'logo' => $team->logoUrl('medium'),
                'modules' => $modules
            ],
            'assignments_options' => config('nexo.assignmentsOptions', []),
            'export_url' => url("{$team->slug}/export"),
            'export_guides_url' => url("{$team->slug}/export/guides"),
        ]);

        event(new TeamServicesWasUpdated($team));

        $this->title = "{$team->name} en Nexo logística";

        return $this->index();
    }

    /**
     * @return string
     */
    private function getFirebaseToken()
    {
        $user = $this->user();

        $jsonFile = \File::get(base_path('nexo-qa-firebase.json'));
        $jsonFileDecode = json_decode($jsonFile);

        $now_seconds = time();

        $payload = array(
            "iss" => $jsonFileDecode->client_email,
            "sub" => $jsonFileDecode->client_email,
            "aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
            "iat" => $now_seconds,
            "exp" => $now_seconds + (60 * 60),  // Maximum expiration time is one hour
            "uid" => $user->id
        );

        return JWT::encode($payload, $jsonFileDecode->private_key, "RS256");
    }



    /**
     * @return string
     */
    public function getGeocode(){
        $string = 'Calle 12a # 71b - 61';
        $return = geocodeAddress($string);
        impr($string);
        impr($return);
        exit;
    }

    
}
