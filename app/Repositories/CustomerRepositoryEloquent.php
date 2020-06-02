<?php

namespace Nexo\Repositories;

use Request;
use File;
use Carbon\Carbon;
use Nexo\Entities\CustomerAddress;
use Nexo\Entities\CustomerPhone;
use Nexo\Entities\Role;
use Nexo\Entities\User;
use Nexo\Validators\CustomerValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\Customer;

/**
 * Class CustomerRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name' => 'like',
        'last_name' => 'like',
        'document' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return CustomerValidator::class;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        \DB::beginTransaction(); 


        // Ahora creando al usuario si no existe
        $customer = Customer::withTrashed()->where('email', '=', $attributes['email'])->first();


        if($customer){
            if($customer->deleted_at){
                $customer->restore();
            } 
            $id = $customer->id;
            $customer = parent::update($attributes, $id);
        }else if(empty($customer)) {
            $customer = parent::create($attributes);
        }        

        /*if (isset($attributes['addresses'])) {
            $customer->addresses()->saveMany(array_map(function ($address) {
                return new CustomerAddress($address);
            }, $attributes['addresses']));
        }*/

        if (isset($attributes['addresses'])) {
            foreach ($attributes['addresses'] as $address) {


                //$fillable = with(new CustomerAddress)->getFillable();
                //$addressData = array_intersect_key($address, array_flip($fillable)); 

                if(empty($address['map'])){
                    $address['map'] = true;
                }

                $address['customer_id'] = $customer->id;

                $modelAddresses = new CustomerAddress();
                $modelAddresses->_save($address);
            }
        }

        /*if (isset($attributes['phones'])) {
            $customer->phones()->saveMany(array_map(function ($phone) {
                return new CustomerPhone($phone);
            }, $attributes['phones']));
        }*/


        if (isset($attributes['phones'])) {
            foreach ($attributes['phones'] as $phone) {

                /*$fillable = with(new CustomerPhone)->getFillable();
                $data = array_intersect_key($phone, array_flip($fillable));

                if (!empty($phone['id'])) {
                    CustomerPhone::where('id', $phone['id'])->update($data);
                } else {
                    $model->phones()->create($data);
                }*/

                $phone['customer_id'] = $customer->id;

                $modelPhone = new CustomerPhone();
                $modelPhone->_save($phone);
            }
        }



        // Ahora creando al usuario si no existe
        $user = User::withTrashed()->where('email', '=', $customer->email)->first();


        if($user){
            if($user->deleted_at){
                $user->restore();
            } 
        }else if(empty($user)) {
            $attributes['password'] = str_random();
            $user = \Sentinel::register($attributes);
            $customerRol = Role::firstOrCreate([
                'slug' => 'customer'
            ]); 

            $user->roles()->attach($customerRol->id);
        }

        
        if ($attributes['team_id']) {
            $user->teams()->detach([$attributes['team_id']]);
            $user->teams()->attach([$attributes['team_id']]); 
        } 

        event('customers.registered', $user);

        $customer->user_id = $user->id;
        $customer->save();

        \DB::commit();


        return $customer;
    }


    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);

        $update = array();
        $update['deleted_at'] = Carbon::now()->toDateTimeString();
        CustomerAddress::where('customer_id', $model->id)->update($update);
        //CustomerAddress::where('id', 45)->update($update);
        if (isset($attributes['addresses'])) {
            foreach ($attributes['addresses'] as $address) {


                //$fillable = with(new CustomerAddress)->getFillable();
                //$addressData = array_intersect_key($address, array_flip($fillable)); 

                if(empty($address['map'])){
                    $address['map'] = true;
                }

                /*impr($attributes);
                impr($address);
                exit;*/

                $address['customer_id'] = $model->id;
                //$address['restore'] = 'true';
                $modelAddresses = new CustomerAddress();
                $modelAddresses->_save($address);


                if (!empty($address['id'])) {
                    $finAddresses = CustomerAddress::withTrashed()->where('id', '=', $address['id'])->first();
                    $finAddresses->restore();
                }

                
                /*if (!empty($address['id'])) {
                    $modelAddresses->where('id', $address['id'])->update($addressData);
                    $modelAddresses->updateMap(true,$address['id']); 

                } else {
                    $model->addresses()->create($addressData);
                }*/
            }
        }



        /*$update = array();
        $update['deleted_at'] = Carbon::now()->toDateTimeString();
        CustomerPhone::where('customer_id', $model->id)->update($update);*/
        if (isset($attributes['phones'])) {
            foreach ($attributes['phones'] as $phone) {

                /*$fillable = with(new CustomerPhone)->getFillable();
                $data = array_intersect_key($phone, array_flip($fillable));

                if (!empty($phone['id'])) {
                    CustomerPhone::where('id', $phone['id'])->update($data);
                } else {
                    $model->phones()->create($data);
                }*/

                $phone['customer_id'] = $model->id;
                //$phone['deleted_at'] = 'true';

                $modelPhone = new CustomerPhone();
                $modelPhone->_save($phone);
            }
        }


        $model->updated_at = Carbon::now()->toDateTimeString();
        $model->save();

        $customer = $model->find($id);
        
        if($customer){
            $user = User::where('id', $customer->user_id)->first(); 

            if(array_key_exists('avatar', $attributes)){
                $avatar = $this->processAvatar($attributes);
                if($avatar){
                    $user->avatar = $avatar;    
                }
            }
            $user->updated_at = Carbon::now()->toDateTimeString();


            $user->first_name = $attributes['first_name'];
            $user->last_name = $attributes['last_name'];

            $user->save();

            if(array_key_exists('password', $attributes)){
               $newPassword = $attributes['password'];

                if (!empty($newPassword)) {
                \Sentinel::update($user, [
                    'password' => $newPassword
                    ]);
                }
            }

           

            if ($attributes['team_id']){
                $user->teams()->sync([$attributes['team_id']]);
            }
        }

        

        return $model;
    }


    /**
     * @param $attributes
     */
    private function processAvatar($attributes)
    {
        $avatar = isset($attributes['avatar']) ? $attributes['avatar'] : false;
        $email = isset($attributes['email']) ? $attributes['email'] : 0;
        $root = storage_path('app/');
        $file = '';

        $ext = File::extension($avatar);


        if (!empty($avatar)) {

            if(!File::exists($avatar) and !empty($ext)){
                $file = $root.$avatar;
            }else{
                $file = $avatar;
            }

            $fileName = sprintf('avatars/%s/%s.jpg', md5($email), md5($file) . str_random(8));
            \Storage::makeDirectory('avatars/' . md5($email));
            $path = storage_path('app/' . $fileName);


            $image = \Image::make(file_get_contents($file));
            $image->fit(300)->save($path);



            return $fileName;
        } else {
            return '';
        }
    }


}