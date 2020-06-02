<?php

namespace Nexo\Http\Controllers;

use Hashids;
use Mail;
use DB;
use Nexo\Entities\Team;
use Nexo\Events\TeamServicesWasUpdated;
use Nexo\Http\Requests;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Nexo\Repositories\LangRepository;
use Nexo\Repositories\ModuleRepository;
use Nexo\Entities\User;


/**
 * Class CustomerController
 * @package Nexo\Http\Controllers
 */
class TestController extends Controller
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
        /*impr('Delete begin');

                //TRUNCATE
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                //service_user
                DB::table('service_user')->truncate();
                //service_type
                DB::table('service_type')->truncate();
                //service_item
                DB::table('service_item')->truncate();
                //services_types_fields
                DB::table('services_types_fields')->truncate();
                //services_types
                DB::table('services_types')->truncate();
                //services_timelines
                DB::table('services_timelines')->truncate();
                //services_recurrence_dates
                DB::table('services_recurrence_dates')->truncate();
                //services_products
                DB::table('services_products')->truncate();
                //services_novelties
                DB::table('services_novelties')->truncate();
                //services_items
                DB::table('services_items')->truncate();
                //service_type
                DB::table('service_type')->truncate();



                //activations
                DB::table('activations')->truncate();
                //customers_phones
                DB::table('customers_phones')->truncate();
                //customers_addresses
                DB::table('customers_addresses')->truncate();
                //customers
                DB::table('customers')->truncate();

                //module_team
                DB::table('module_team')->truncate();

                //password_resets
                DB::table('password_resets')->truncate();

                //persistences
                DB::table('persistences')->truncate();

                //polls_answers_options
                DB::table('polls_answers_options')->truncate();
                //polls_questions
                DB::table('polls_questions')->truncate();
                //polls_options
                DB::table('polls_options')->truncate();
                //polls_answers
                DB::table('polls_answers')->truncate();
                //polls
                DB::table('polls')->truncate();

                //products_categories
                DB::table('products_categories')->truncate();
                //products
                DB::table('products')->truncate();

                //revisions
                DB::table('revisions')->truncate();

                //role_users
                DB::table('role_users')->truncate();

                //sessions
                DB::table('sessions')->truncate();

                //tools_products
                DB::table('tools_products')->truncate();

                //tools_services_types
                DB::table('tools_services_types')->truncate();

                //teams_roles_limits
                DB::table('teams_roles_limits')->truncate();


                //users_contact_data
                DB::table('users_contact_data')->truncate();
                //users_devices
                DB::table('users_devices')->truncate();
                //users_geolocalizations
                DB::table('users_geolocalizations')->truncate();
                //users_pushes
                DB::table('users_pushes')->truncate();
                //users_transports
                DB::table('users_transports')->truncate();
                //users
                DB::table('users')->truncate();

                //users
                DB::table('users')->truncate();

                //team_user
                DB::table('team_user')->truncate();

                //teams
                DB::table('teams')->truncate();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');


                //INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES (1,	1,	'fafTPLAv5xIykRbrux9whR55VDDqPj1H',	1,	'2015-11-13 15:30:20',	'2015-11-13 15:30:19',	'2015-11-13 15:30:19');
                //INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `avatar`, `app_status`, `remember_token`, `code`, `lang`, `deleted_at`) VALUES (1,	'admin@nexo.co',	'$2y$10$p9nsZbbdyWC2CCW7rz9wR.Dm2gAdYAQi1a/N7qUmjUdTJnSHoqwpO',	NULL,	'2016-04-15 01:31:07',	'Administrador',	'Nexo',	'2015-11-13 15:30:19',	'2018-06-27 00:36:42',	'avatars/temp-5a35c99dfe02362c675a6aa434724c0a.jpg',	'STAND_BY',	'No0j59ltHo2RO6xkcd1AmijQAjrsFuBwr3sQrK30OPGZNrIZBMSvYMaFp4IK',	'1',	'en',	NULL);
                //INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES (1,	1,	'2015-11-13 15:30:19',	'2015-11-13 15:30:19')

        impr('Delete end');
        exit;*/

    }

    public function getSendmail(){
        $user= new \stdClass();
        $user->email = 'info@andresamaya.co';
        $user->name = 'Info';
        $user->token = 'asdasdd';
        $args = [
            'user' => $user,
            'first_name' => 'ANdres amaya',
            'token' => $user->token,
        ];

        Mail::send('emails.password', $args, function ($m) use ($user) {
            $m->from('welcome@nexologistica.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }



}
