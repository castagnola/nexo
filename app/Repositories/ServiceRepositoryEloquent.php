<?php

namespace Nexo\Repositories;

use Auth;
use Carbon\Carbon;
use Nexo\Entities\Criteria\Service\DateCriteria;
use Nexo\Entities\Criteria\Service\KeywordsCriteria;
use Nexo\Entities\Criteria\Service\StatusCriteria;
use Nexo\Entities\Criteria\Service\UserCriteria;
use Nexo\Entities\CustomerAddress;
use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\ServiceStatus;
use Nexo\Entities\ServiceType;
use Nexo\Entities\Team;
use Nexo\Events\ServiceWasAssigned;
use Nexo\Events\UserWasUpdateItinerary;
use Nexo\Services\Assignment;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\Service;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class ServiceRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code' => 'like',
        'service_status_id' => '=',
        'service_type_id' => '=',
        'created_by' => '=',
        'customer_id' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(StatusCriteria::class));
        $this->pushCriteria(app(DateCriteria::class));
        $this->pushCriteria(app(KeywordsCriteria::class));
        $this->pushCriteria(app(UserCriteria::class));
    }


    /**
     * Find data by code
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findByCode($code, $columns = array('*'))
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where('code', $code)->firstOrFail();
        $this->resetModel();
        return $this->parserResult($model);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        \DB::beginTransaction();


        // Procesando la duración
        $team = Team::find($attributes['team_id']);

        $serviceStatusSlug = 'pendiente';

        $assignments = isset($attributes['assignments']) ? $attributes['assignments'] : false;
        $users = isset($attributes['users']) ? $attributes['users'] : false;

        /*
        if (!empty($assignments) and $attributes['assignment_type'] == 'demand') {
            $serviceStatusSlug = 'en-espera';
        }

        if (!empty($users) and $attributes['assignment_type'] == 'mandatory') {
            $serviceStatusSlug = 'por-ejecutar';
        }
        */

        // Generando el código
        $servicesByTeamCounter = $team->services->count();
        do {
            $servicesByTeamCounter++;
            $attributes['code'] = sprintf("%'13d", $team->id) . sprintf("%03d", $servicesByTeamCounter);
        } while (!parent::findByField('code', $attributes['code'])->isEmpty());


        // Generando el código
        $attributes['verification_code'] = mt_rand(1000, 999999);

        $serviceStatus = ServiceStatus::where('slug', $serviceStatusSlug)->first();
        $attributes['service_status_id'] = $serviceStatus->id;


        $this->preSave($attributes);
        $service = parent::create($attributes);
        $this->postSave($service, $attributes);

        $old = $attributes;

        if($attributes['date_type'] == 'recurrent'){
            if($attributes['recurrence_dates']){
                foreach ($old['recurrence_dates'] as $k => $recurrence) {
                    if(setDate($old['start_at'],'Y-m-d') != setDate($recurrence['start'],'Y-m-d')){
                        $attributes['parent_code'] = $service->code;
                        $attributes['start_at'] =  $recurrence['start'];
                        $attributes['end_at'] =  $recurrence['end'];
                        $this->recurrent($attributes);
                    }

                }
            }
        }

        \DB::commit();
        event('service.notification', $service);


        return $service;
    }


    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        \DB::beginTransaction();

        $error = collect();

        $user = Auth::user();

        if(array_key_exists('only', $attributes)){


            if(array_key_exists('verification_code', $attributes)){
                $verification = $attributes['verification_code'];
                $model = $this->find($id);
                if ($model->verification_code != $verification) {
                    abort(500, 'El código de verificación es incorrecto.');
                    return $model;
                }

                //$service = parent::update($attributes, $id);
            }



            if(array_key_exists('service_status_id', $attributes)){
                $service = parent::update($attributes, $id);
                if($attributes['service_status_id'] == 4){
                    $users = $service->users;
                    if (!empty($users)) {
                            $usersToSync = [];
                            $userId = $user->id;
                            $currentUsersFiltered = $service->users->where('id', $userId);
                            $currentUser = !$currentUsersFiltered->isEmpty() ? $currentUsersFiltered->first() : false;
                            if($currentUser){
                                $usersToSync[$userId] = [
                                    'accepted' => 1,
                                ];
                                $service->users()->sync($usersToSync);
                            }

                    }
                }
            }

            if(array_key_exists('novelties', $attributes)){
                $service = parent::update($attributes, $id);
                $novelties = isset($attributes['novelties']) ? $attributes['novelties'] : false;

                if (!empty($novelties)) {
                    $serviceNoveltyRepository = app(ServiceNoveltyRepository::class);

                    $protectedNovelties = array();

                    foreach ($novelties as $k => $novelty) {


                        $noveltyId = 0;
                        $currentNovelty = 0;

                        if(array_key_exists('id', $novelties[$k])){
                            $noveltyId = $novelties[$k]['id'];
                        }


                        //$currentUsersFiltered = $service->users->where('product_id', $productId);
                        //$currentProduct =  !$currentUsersFiltered->isEmpty() ? $currentUsersFiltered->first() : false;
                        if($noveltyId){
                            $currentNovelty = $serviceNoveltyRepository->find($noveltyId);
                        }


                        $dataToNovelty = [
                                            'service_id' => $service->id,
                                            'observation' => $novelty['observations']
                                        ];

                        if(!empty($currentNovelty)){
                            $newNovelty = $serviceNoveltyRepository->update($dataToNovelty, $currentNovelty->id);
                        } else {
                            $newNovelty = $serviceNoveltyRepository->create($dataToNovelty);
                        }

                        $protectedNovelties[] = $newNovelty->id;
                    }

                    $service->novelties()->whereNotIn('id', $protectedNovelties)->delete();
                } else {
                    // Eliminando todos los productos (por si hay)
                    //$service->novelties()->delete();
                }
            }


        }else{
            $this->preSave($attributes);
            $service = parent::update($attributes, $id);
            $this->postSave($service, $attributes);
            /*
                $old = $attributes;

                if($attributes['date_type'] == 'recurrent'){
                    if($attributes['recurrence_dates']){
                        foreach ($attributes['recurrence_dates'] as $k => $recurrence) {
                            if(setDate($old['start_at'],'Y-m-d') != setDate($recurrence['start'],'Y-m-d')){
                                $attributes['parent_code'] = $service->code;
                                $attributes['start_at'] =  $recurrence['start'];
                                $attributes['end_at'] =  $recurrence['end'];
                                $this->recurrent($attributes);
                            }

                        }
                    }
                }
            */

        }

        \DB::commit();

        event('service.notification', $service);




        return $service;
    }

    /**
     * Antes de guardar
     *
     * @param $attributes
     */
    private function preSave(&$attributes)
    {
        // TIene o no duración?
        $defaultDuration = 30;

        if (!isset($attributes['duration'])) {
            $attributes['duration'] = $defaultDuration;
        } else {
            if (empty($attributes['duration'])) {
                $attributes['duration'] = $defaultDuration;
            }
        }

        // Es con servicios y/o productos?
        $withServices = false;
        $withProducts = false;

        switch ($attributes['with']) {
            case 'both':
                $withServices = true;
                $withProducts = true;
                break;
            case 'services':
                $withServices = true;
                break;
            case 'products':
                $withProducts = true;
                break;

        }
        //unset($attributes['with']);
        $attributes['with_services'] = $withServices;
        $attributes['with_products'] = $withProducts;

        // Procesando fechas y duración si es inmediato
        // Corrigiendo fechas
        if ($attributes['date_type'] == 'inmediate' ) {

            $startAt = Carbon::now();
            //$endAt = clone $startAt;
            $endAt = Carbon::now();

            $endAt->addMinutes($attributes['duration']);

            $attributes['start_at'] = $startAt->toDateTimeString();
            $attributes['end_at'] = $endAt->toDateTimeString();

        }else if($attributes['date_type'] == 'schedule'){


            $startAt = (new \Carbon\Carbon($attributes['start_at']))->toDateTimeString();
            $endAt = (new \Carbon\Carbon($attributes['end_at']))->toDateTimeString();

            if($endAt < $startAt){
                $endAt = (new \Carbon\Carbon($attributes['start_at']));
            }else{
                $endAt = (new \Carbon\Carbon($attributes['end_at']));
            }

            $startAt = (new \Carbon\Carbon($attributes['start_at']));


            $endAt->addMinutes($attributes['duration']);


            $attributes['start_at'] = $startAt->toDateTimeString();
            $attributes['end_at'] = $endAt->toDateTimeString();



        }else if($attributes['date_type'] == 'recurrent'){

            $startAt = (new \Carbon\Carbon($attributes['start_at']))->toDateTimeString();
            $endAt = (new \Carbon\Carbon($attributes['end_at']))->toDateTimeString();

            if($endAt < $startAt){
                $endAt = (new \Carbon\Carbon($attributes['start_at']));
            }else{
                $endAt = (new \Carbon\Carbon($attributes['end_at']));
            }

            $startAt = (new \Carbon\Carbon($attributes['start_at']));
            $endAt->addMinutes($attributes['duration']);


            $attributes['start_at'] = $startAt->toDateTimeString();
            $attributes['end_at'] = $endAt->toDateTimeString();

            if (isset($attributes['recurrence_start'])) {
                if (!empty($attributes['recurrence_start'])) {
                    $attributes['recurrence_start'] = (new \Carbon\Carbon($attributes['recurrence_start']))->toDateTimeString();
                }
            }
            if (isset($attributes['recurrence_end'])) {
                if (!empty($attributes['recurrence_end'])) {
                    $attributes['recurrence_end'] = (new \Carbon\Carbon($attributes['recurrence_end']))->toDateTimeString();
                }
            }


            /*$startAtRecurrence = (new \Carbon\Carbon($attributes['recurrence_start']))->toDateTimeString();
            $endAtRecurrence = (new \Carbon\Carbon($attributes['recurrence_end']))->toDateTimeString();

            if($endAtRecurrence < $startAtRecurrence){
                $endAtRecurrence = (new \Carbon\Carbon($attributes['recurrence_start']));
            }else{
                $endAtRecurrence = (new \Carbon\Carbon($attributes['recurrence_end']));
            }

            $startAtRecurrence = (new \Carbon\Carbon($attributes['recurrence_start']));


            $attributes['recurrence_start'] = $startAtRecurrence->toDateTimeString();
            $attributes['recurrence_end'] = $endAtRecurrence->toDateTimeString();*/

        } else {
            if (!empty($attributes['start_at'])) {
                $attributes['start_at'] = (new \Carbon\Carbon($attributes['start_at']))->toDateTimeString();
            }
            if (!empty($attributes['end_at'])) {
                $attributes['end_at'] = (new \Carbon\Carbon($attributes['end_at']))->toDateTimeString();
            }
            if (isset($attributes['recurrence_start'])) {
                if (!empty($attributes['recurrence_start'])) {
                    $attributes['recurrence_start'] = (new \Carbon\Carbon($attributes['recurrence_start']))->toDateTimeString();
                }
            }
            if (isset($attributes['recurrence_end'])) {
                if (!empty($attributes['recurrence_end'])) {
                    $attributes['recurrence_end'] = (new \Carbon\Carbon($attributes['recurrence_end']))->toDateTimeString();
                }
            }
        }

        // Procesando dirección y mapa
        $this->processAddress($attributes);

        // Procesando recurrencia
        //$this->processRecurrence($attributes);
    }


    /**
     * @param $attributes
     */
    private function processRecurrence(&$attributes)
    {
        // Recurrencia creando las fechas
        if ($attributes['date_type'] == 'recurrent') {
            $attributes['recurrence_dates'] = Assignment::calculateRecurrence($attributes);
        }
    }

    /**
     * @param $attributes
     */
    private function processAddress(&$attributes)
    {
        // Dirección
        $address = CustomerAddress::find($attributes['customer_address_id']);

        $attributes['city_id'] = isset($attributes['city_id']) ? $attributes['city_id'] : $address->city_id;
        $attributes['address'] = isset($attributes['address']) ? $attributes['address'] : $address->street;
        $attributes['address_city'] = isset($attributes['address_city']) ? $attributes['address_city'] : $address->address_city;
        $attributes['address_place_id'] = isset($attributes['address_place_id']) ? $attributes['address_place_id'] : $address->address_place_id;
        $attributes['address_state'] = isset($attributes['address_state']) ? $attributes['address_state'] : $address->address_state;
        $attributes['address_district'] = isset($attributes['address_district']) ? $attributes['address_district'] : $address->address_district;
        $attributes['address_vicinity'] = isset($attributes['address_vicinity']) ? $attributes['address_vicinity'] : $address->address_vicinity;
        $attributes['address_observations'] = isset($attributes['address_observations']) ? $attributes['address_observations'] : $address->address_observations;
        $attributes['latitude'] = isset($attributes['latitude']) ? $attributes['latitude'] : $address->latitude;
        $attributes['longitude'] = isset($attributes['longitude']) ? $attributes['longitude'] : $address->longitude;
        $attributes['map'] = $address->map;

        if (empty($attributes['latitude'])) {
            $attributes['latitude'] = 0;
        }

        if (empty($attributes['longitude'])) {
            $attributes['longitude'] = 0;
        }
    }


    /**
     * @param $service
     * @param $attributes
     */
    private function postSave($service, $attributes) {
        $now = Carbon::now();
        $nowDateTimeString = $now->toDateTimeString();

        $users = isset($attributes['users']) ? $attributes['users'] : false;
        $items = isset($attributes['items']) ? $attributes['items'] : false;
        $extra = isset($attributes['extra']) ? $attributes['extra'] : false;

        $services = isset($attributes['services']) ? $attributes['services'] : false;
        $products = isset($attributes['products']) ? $attributes['products'] : false;

        $recurrenceDates = isset($attributes['recurrence_dates']) ? $attributes['recurrence_dates'] : false;

        // Prevenir que se creen fechas recurrentes si no es del tipo
        if($attributes['date_type'] != 'recurrent' && !empty($recurrenceDates)){
            $recurrenceDates = [];
        }

        // Prevenir que se queden los productos y/o servicios
        if($attributes['with_services'] and !$attributes['with_products']){
            $products = [];
        }
        if($attributes['with_products'] and !$attributes['with_services']){
            $services = [];
        }

        /* Aún no se sabe como manejar esto
        if (!empty($items)) {
            $service->items()->sync($items);
        }
        */

        if (!empty($services)) {
            $service->types()->sync($services);
        }

        if (!empty($users)) {
            $usersToSync = [];

            $accepted = $service->assignment_type == 'mandatory';

            foreach ($users as $userId) {
                $currentUsersFiltered = $service->users->where('id', $userId);
                $currentUser = !$currentUsersFiltered->isEmpty() ? $currentUsersFiltered->first() : false;

                $usersToSync[$userId] = [
                    'created_at' => !empty($currentUser) ? $currentUser->pivot->created_at : $nowDateTimeString,
                    'accepted' => !empty($currentUser) ? $currentUser->pivot->accepted : $accepted,
                ];
            }

            $service->users()->sync($usersToSync);
        }




        if (!empty($products)) {
            $serviceProductRepository = app(ServiceProductRepository::class);

            $protectedProducts = [];

            foreach ($products as $product) {
                // Decodificando el ID ya que fue enviado codificado desde el transformer
                $productId = Hashids::decode($product['id'])[0];

                $currentUsersFiltered = $service->users->where('product_id', $productId);
                $currentProduct =  !$currentUsersFiltered->isEmpty() ? $currentUsersFiltered->first() : false;

                $dataToProduct = [
                    'service_id' => $service->id,
                    'product_id' => $productId,
                    'quantity' => $product['quantity']
                ];

                if(!empty($currentProduct)){
                    $newProduct = $serviceProductRepository->update($dataToProduct, $currentProduct->id);
                } else {
                    $newProduct = $serviceProductRepository->create($dataToProduct);
                }

                $protectedProducts[] = $newProduct->id;
            }

            $service->products()->whereNotIn('id', $protectedProducts)->delete();
        } else {
            // Eliminando todos los productos (por si hay)
            $service->products()->delete();
        }







        // Guardando información extra
        if (!empty($extra)) {

            $serviceExtraRepository = app(ServiceExtraRepository::class);

            // Borrando los extra antes de guardarlos
            $service->extra()->delete();

            foreach ($extra as $serviceFieldTypeId => $value) {
                $serviceExtraRepository->create([
                    'service_id' => $service->id,
                    'service_type_field_id' => $serviceFieldTypeId,
                    'value' => $value
                ]);
            }
        }

        // Guardando las fechas recurrentes
        if (!empty($recurrenceDates)) {
            $recurrenceDatesRepository = app(ServiceRecurrenceDateRepository::class);

            foreach ($recurrenceDates as $recurrenceDate) {
                $recurrenceDate['service_id'] = $service->id;
                $recurrenceDate['status_id'] = $service->status->id;

                $recurrenceDatesRepository->create($recurrenceDate);
            }
        } else {
            $service->recurrenceDates()->delete();
        }
    }

      /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    private function recurrent(array $attributes){
        \DB::beginTransaction();

        // Procesando la duración
        $team = Team::find($attributes['team_id']);

        $serviceStatusSlug = 'pendiente';

        $assignments = isset($attributes['assignments']) ? $attributes['assignments'] : false;
        $users = isset($attributes['users']) ? $attributes['users'] : false;

        /*
        if (!empty($assignments) and $attributes['assignment_type'] == 'demand') {
            $serviceStatusSlug = 'en-espera';
        }

        if (!empty($users) and $attributes['assignment_type'] == 'mandatory') {
            $serviceStatusSlug = 'por-ejecutar';
        }
        */

        // Generando el código
        $servicesByTeamCounter = $team->services->count();
        do {
            $servicesByTeamCounter++;
            $attributes['code'] = sprintf("%'13d", $team->id) . sprintf("%03d", $servicesByTeamCounter);
        } while (!parent::findByField('code', $attributes['code'])->isEmpty());


        // Generando el código
        $attributes['verification_code'] = mt_rand(1000, 999999);

        $serviceStatus = ServiceStatus::where('slug', $serviceStatusSlug)->first();
        $attributes['service_status_id'] = $serviceStatus->id;


        $this->preSave($attributes);
        $service = parent::create($attributes);
        $this->postSave($service, $attributes);

        //event('service.notification', $service);

        \DB::commit();

        return $service;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $model = $this->find($id);

        $model->assignments()->delete();
        $model->routes()->delete();
        $users = $model->users;

        $deleted = parent::delete($id);

        if ($deleted) {
            foreach ($users as $user) {
                event(new UserWasUpdateItinerary($user));
            }
        }
    }


}