<?php

namespace Nexo\Http\Controllers;

use Hashids;
use Auth;
use Session;
use Nexo\Entities\Team;
use Nexo\Entities\ServiceStatus;
use Nexo\Events\TeamServicesWasUpdated;
use Nexo\Http\Requests;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Nexo\Repositories\LangRepository;
use Nexo\Repositories\ModuleRepository;


/**
 * Class HomeController
 * @package Nexo\Http\Controllers
 */
class HomeController extends Controller
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
    public function index()
    {

        // Languages
        $lang = [];
        $langs = $this->langRepository->all();

        $langs->each(function ($item) use (&$lang) {
            $lang[$item->code] = $item->content;
        });

        $user = $this->user();

        \App::setLocale($user->lang);


        \JavaScript::put([
            'documentTypes' => config('nexo.documentTypes'),
            'phonesTypes' => config('nexo.phonesTypes'),
            'token' => \JWTAuth::fromUser($user),
            'firebaseToken' => $this->getFirebaseToken(),
            'rights' => $this->getRights(),
            'roles' => $user->roles->lists('slug')->toArray(),
            'lang' => $user->lang,
            'user' => [
                'id' => $user->id,
                'first_name' => $user->first_name
            ]
        ]);

        if (empty($this->title)) {
            $this->title = 'Nexo logística';
        }

        $title = $this->title;


        if($user->inRole('customer')){
            return redirect('/customer#/customer');
        }

        if($user->inRole('rutero') or $user->inRole('team-admin') or $user->inRole('despachador')){
            $teamSlug = request()->segment(1);
            //$hash = request();

            $team = $user->teams()->first();

            if($teamSlug == $team->slug){
                return view('dashboard', compact('user', 'title'));
            }else{
                return redirect('/'.$team->slug);
            }
        }

        if($user->inRole('admin')){
            return view('dashboard', compact('user', 'title'));
        }

    }

    /**
     * @return string
     */
    public function inactive($lang){

        return view('auth.inactive')->with('errors',$errors);
    }

    /**
     * @return string
     */
    public function language($lang){

        $file = file_get_contents(base_path().'/resources/lang/'.$lang.'/app.json');

        echo $file;

    }


    /**
     * @param $teamSlug
     * @return \Illuminate\Http\Response
     */
    public function team($teamSlug)
    {
        $error = array();
        $errors = collect();

        $team = Team::where('slug', $teamSlug)
                    ->firstOrFail();

        if(empty($team) or $team->status == 'inactive'){

            if(empty($team)){
                $error[] = 'La empresa asignada no exite por favor contactese a nuestros adminsitradores';   
            }

            if($team->status == 'inactive'){
                $error[] = 'La empresa '.$team->name.' esta <strong>Inactiva</strong> por favor contactese con nuestros administradores';
            }


            
            $errors->put('errors',$error);
            return view('auth.inactive')->with('errors',$errors);
        }
        

        $teamId = $team->hashId;
        $teamModulesIds = $team->modules->lists('id')->toArray();


        // Modules actived
        $modules = $this->moduleRepository->all(['id', 'name', 'slug'])->map(function ($module) use ($teamModulesIds) {
            $module->active = in_array($module->id, $teamModulesIds);
            return $module;
        });

        $statuses = convertArray('services_statuses','name','id');

        if($statuses){
            $states = array();
            $count = 0;
            foreach ($statuses as $key => $status) {
                $states[$count]['value'] = $key;
                $states[$count]['name'] = $status;
               $count++;
            }
        } 

        \JavaScript::put([
            'team' => [
                'id' => $teamId,
                'name' => $team->name,
                'logo' => $team->logoUrl('medium'),
                'modules' => $modules
            ],
            'assignments_options' => config('nexo.assignmentsOptions', []),
            'statuses_options' => $states,
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

    
}
